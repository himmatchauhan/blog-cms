# Laravel Blog CMS

A complete blog website with CMS functionality built with Laravel 12 and Blade templating engine.

## Features

### Public Blog
- **Homepage**: Displays a list of published blog posts with pagination
- **Individual Post Pages**: Full view of selected blog posts
- **Responsive Design**: Modern, mobile-friendly interface
- **SEO Friendly**: Clean URLs with slugs

### Admin Panel (CMS)
- **Authentication**: Secure login system
- **Dashboard**: Overview with statistics and recent posts
- **Post Management**: Complete CRUD operations
  - Create new blog posts
  - Edit existing posts
  - Delete posts
  - View all posts with pagination
- **Image Upload**: Cover image support for posts
- **Publish Control**: Draft/publish functionality

### Technical Features
- **Laravel 12**: Latest Laravel framework
- **Blade Templates**: Clean, maintainable views
- **MySQL Database**: Robust data storage
- **Eloquent ORM**: Proper model relationships and scopes
- **File Storage**: Secure image upload and storage
- **Responsive UI**: Bootstrap 5 with custom styling

## Requirements

- PHP 8.2 or higher
- Composer
- MySQL 5.7 or higher
- Node.js (for asset compilation - optional)

## Installation

1. **Clone the repository**
   ```bash
   git clone <your-repo-url>
   cd blog-cms-lv
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies (optional)**
   ```bash
   npm install
   npm run dev
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database in `.env`**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run migrations and seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

7. **Create storage link**
   ```bash
   php artisan storage:link
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

## Default Credentials

After running the seeder, you can login with:
- **Email**: admin@blog.com
- **Password**: password

## Usage

### Public Blog
- Visit the homepage to see published blog posts
- Click on any post to read the full content
- Navigate through pages using pagination

### Admin Panel
- Login at `/login` with admin credentials
- Access dashboard at `/admin/dashboard`
- Manage posts at `/admin/posts`
- Create new posts at `/admin/posts/create`

## Project Structure

```
blog-cms-lv/
├── app/
│   ├── Http/Controllers/
│   │   ├── AdminController.php      # Admin dashboard
│   │   ├── BlogController.php       # Public blog
│   │   └── PostController.php       # Post CRUD operations
│   └── Models/
│       └── Post.php                 # Post model with relationships
├── database/
│   ├── migrations/                  # Database schema
│   ├── seeders/                     # Sample data
│   └── factories/                   # Post factory
├── resources/views/
│   ├── admin/                       # Admin panel views
│   │   ├── dashboard.blade.php
│   │   └── posts/
│   │       ├── index.blade.php
│   │       ├── create.blade.php
│   │       └── edit.blade.php
│   └── blog/                        # Public blog views
│       ├── index.blade.php
│       └── show.blade.php
└── routes/
    └── web.php                      # Application routes
```

## Database Schema

### Posts Table
- `id` - Primary key
- `title` - Post title
- `slug` - URL-friendly identifier
- `cover_image` - Optional cover image path
- `short_description` - Brief post summary
- `content` - Full post content
- `is_published` - Publication status
- `published_at` - Publication timestamp
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

## Customization

### Styling
- Modify CSS in the Blade templates
- Update Bootstrap classes for different themes
- Customize the hero section gradients

### Features
- Add categories/tags to posts
- Implement user comments
- Add search functionality
- Create multiple user roles
- Add post scheduling

## Security Features

- CSRF protection on all forms
- Authentication middleware for admin routes
- File upload validation
- SQL injection prevention via Eloquent
- XSS protection with proper output escaping

## Performance

- Database indexing on frequently queried fields
- Pagination for large datasets
- Optimized image storage
- Efficient Eloquent queries with scopes

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For support and questions, please open an issue in the GitHub repository.

---

**Built with ❤️ using Laravel 12**
