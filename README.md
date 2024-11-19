# Laravel 11 Blog API

This project is a RESTful API for a blog application built with Laravel 11. It provides endpoints for managing blogs, posts, likes, and comments.

## Requirements

- PHP 8.1 or higher
- Composer
- MySQL or compatible database
- Node.js and npm (for frontend assets, if applicable)

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/fredneutron/blog-api.git
   cd blog-api
   ```

2. Install PHP dependencies:
   ```
   composer install
   ```

3. Copy the example environment file and modify it to match your local environment:
   ```
   cp .env.example .env
   ```

4. Generate an application key:
   ```
   php artisan key:generate
   ```

5. Create a new database for the application.

6. Update the .env file with your database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

7. Run the database migrations and seed the database:
   ```
   php artisan migrate --seed
   ```

## Running the Application

To start the development server:

```
php artisan serve
```

The API will be available at `http://localhost:8000`.

## API Usage

All API endpoints require the `Authorization` header with the value `vg@123`.

### Blogs

- GET /api/blogs - Get all blogs
- POST /api/blogs - Create a new blog
- GET /api/blogs/{id} - Get a specific blog
- PUT /api/blogs/{id} - Update a blog
- DELETE /api/blogs/{id} - Delete a blog

### Posts

- GET /api/blogs/{blog_id}/posts - Get all posts for a blog
- POST /api/blogs/{blog_id}/posts - Create a new post
- GET /api/blogs/{blog_id}/posts/{id} - Get a specific post
- PUT /api/blogs/{blog_id}/posts/{id} - Update a post
- DELETE /api/blogs/{blog_id}/posts/{id} - Delete a post

### Interactions

- POST /api/posts/{post_id}/like - Like a post
- POST /api/posts/{post_id}/comment - Comment on a post

## Testing

To run the test suite:

```
php artisan test
```

## Troubleshooting

If you encounter any issues, try the following:

1. Clear the application cache:
   ```
   php artisan cache:clear
   ```

2. Clear the route cache:
   ```
   php artisan route:clear
   ```

3. Clear the config cache:
   ```
   php artisan config:clear
   ```

4. Restart the development server.

If problems persist, check the Laravel log file at `storage/logs/laravel.log` for more detailed error information.

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.