# Le Lagon Apartments - PHP MVC CMS

A custom PHP-based Content Management System (CMS) with MVC architecture for managing hotel/apartment booking websites. Built specifically for shared web hosting environments with MySQL database support.

## Features

- ✅ **PHP MVC Architecture** - Clean separation of concerns with Model-View-Controller pattern
- ✅ **Database-Driven** - All content stored in MySQL database
- ✅ **Fully Customizable CMS** - Manage every section through admin panel:
  - Hero Slider
  - About Section
  - Services/Prices
  - Rooms/Apartments
  - Footer Content
  - Site Settings
  - Navigation Menu
  - Social Media Links
- ✅ **Responsive Design** - Mobile-friendly Bootstrap-based templates
- ✅ **SEO Friendly** - Clean URLs with .htaccess routing
- ✅ **Secure** - Password hashing, SQL injection protection, XSS prevention
- ✅ **Booking System** - Database structure for managing bookings
- ✅ **Admin Panel** - Intuitive interface for content management

## System Requirements

- **PHP**: 7.4 or higher
- **MySQL**: 5.7 or higher
- **Apache**: 2.4 or higher (with mod_rewrite enabled)
- **PDO Extension**: Enabled

## Directory Structure

```
Le-Lagon-Apartments/
├── app/
│   ├── controllers/       # Application controllers
│   │   ├── HomeController.php
│   │   └── AdminController.php
│   ├── models/           # Database models
│   │   ├── HeroSlider.php
│   │   ├── AboutSection.php
│   │   ├── Services.php
│   │   ├── Rooms.php
│   │   └── ...
│   ├── views/            # View templates
│   │   ├── frontend/     # Public website views
│   │   ├── admin/        # Admin panel views
│   │   └── components/   # Reusable components (header, footer)
│   └── core/             # Core MVC classes
│       ├── Router.php
│       ├── Controller.php
│       └── Model.php
├── assets/               # Static assets (CSS, JS, images)
│   ├── css/
│   ├── js/
│   └── imgs/
├── config/
│   └── database.php      # Database configuration
├── database/
│   ├── schema.sql        # Database schema
│   └── sample_data.sql   # Sample content
├── logs/                 # Application logs
│   └── error.log
├── index.php             # Application entry point
├── .htaccess             # URL rewriting rules
├── .gitignore
└── README.md
```

## Installation

### Step 1: Upload Files

1. Upload all files to your web hosting server
2. All files should be placed directly in your `public_html` or web root directory
3. The directory structure should look like:
   ```
   /home/yourusername/public_html/
   ├── index.php
   ├── .htaccess
   ├── assets/
   ├── app/
   ├── config/
   ├── database/
   ├── logs/
   └── ...
   ```

### Step 2: Database Setup

1. Create a MySQL database (e.g., `le_lagon_apartments`)
2. Import the database schema:
   ```sql
   mysql -u username -p database_name < database/schema.sql
   ```
3. Import sample data (optional):
   ```sql
   mysql -u username -p database_name < database/sample_data.sql
   ```

### Step 3: Configuration

1. Edit `/config/database.php`
2. Update the database credentials:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'your_database_name');
   define('DB_USER', 'your_username');
   define('DB_PASS', 'your_password');
   ```

### Step 4: Apache Configuration

Ensure your Apache has `mod_rewrite` enabled. If using shared hosting, the `.htaccess` file in `/public` should handle URL rewriting automatically.

### Step 5: Set Permissions

```bash
chmod 755 .
chmod 644 index.php
chmod 644 .htaccess
chmod 755 logs/
chmod 666 logs/error.log
```

## Usage

### Accessing the Website

- **Frontend**: `http://yourdomain.com/`
- **Admin Panel**: `http://yourdomain.com/admin`

### Default Admin Credentials

- **Username**: `admin`
- **Email**: `admin@lelagon.com`
- **Password**: `admin123`

⚠️ **Important**: Change the default password immediately after first login!

### Admin Panel Features

1. **Dashboard** - Overview of site content
2. **Hero Slider** - Manage homepage slider images and text
3. **About Section** - Edit about us content
4. **Services** - Manage services/amenities with pricing
5. **Rooms** - Add/edit room listings
6. **Footer** - Customize footer content
7. **Settings** - Site-wide settings (name, contact info, etc.)

## Database Schema

The system includes comprehensive database tables:

- `site_settings` - Site configuration
- `header_content` - Header/logo information
- `navigation_menu` - Menu items
- `hero_slider` - Homepage slider
- `text_sections` - Content sections
- `about_section` - About page content
- `services` - Services/amenities
- `service_features` - Service details
- `rooms` - Room listings
- `room_amenities` - Room features
- `testimonials` - Customer testimonials
- `footer_content` - Footer sections
- `social_links` - Social media links
- `bookings` - Booking records
- `admin_users` - Admin accounts

## Customization

### Adding New Pages

1. Create a route in `app/core/Router.php`:
   ```php
   $this->addRoute('GET', '/new-page', 'HomeController', 'newPage');
   ```

2. Add method to controller:
   ```php
   public function newPage() {
       $data = ['pageTitle' => 'New Page'];
       $this->view('frontend/new-page', $data);
   }
   ```

3. Create view file: `app/views/frontend/new-page.php`

### Creating New Admin Sections

1. Create a model in `app/models/`
2. Add methods to `AdminController.php`
3. Create view in `app/views/admin/`
4. Add routes in `Router.php`

## Security Features

- **Password Hashing**: Using PHP's `password_hash()` with bcrypt
- **SQL Injection Protection**: PDO prepared statements
- **XSS Prevention**: HTML entity encoding in views
- **CSRF Protection**: Session-based validation (implement tokens as needed)
- **Access Control**: Authentication required for admin panel
- **Secure Headers**: XSS protection, clickjacking prevention

## Troubleshooting

### 404 Errors

- Ensure `mod_rewrite` is enabled in Apache
- Check `.htaccess` file is in the root directory
- Verify all files are uploaded to the web root (public_html)

### Database Connection Errors

- Verify database credentials in `config/database.php`
- Ensure MySQL server is running
- Check database user permissions

### Blank Page

- Enable error reporting in `index.php` temporarily
- Check PHP error logs in `logs/error.log`
- Verify all required files are uploaded

## Future Enhancements

- Complete CRUD operations for all admin sections
- Image upload functionality
- Email notification system
- Online booking form
- Payment gateway integration
- Multi-language support
- REST API for mobile apps

## Support

For issues or questions:
1. Check the database schema in `/database/schema.sql`
2. Review error logs
3. Verify file permissions

## License

This is a custom CMS built for Le Lagon Apartments. Modify as needed for your project.

## Credits

- Template: Boostay Hotel Booking Template
- Framework: Custom PHP MVC
- Database: MySQL
- Frontend: Bootstrap 5, jQuery, Swiper.js

---

**Note**: This CMS provides the structure and foundation. Additional functionality (image uploads, advanced booking system, payment processing) can be added based on specific requirements.
