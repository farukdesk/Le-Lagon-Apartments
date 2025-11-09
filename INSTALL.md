# Installation Guide - Le Lagon Apartments CMS

This guide will walk you through the complete installation process for setting up the Le Lagon Apartments CMS on your web hosting server.

## Prerequisites

Before you begin, ensure you have:
- Access to a web hosting account with PHP and MySQL support
- FTP client (FileZilla, Cyberduck, etc.) or cPanel File Manager
- Database management tool (phpMyAdmin, MySQL Workbench, or command line)
- A text editor for configuration

## Step-by-Step Installation

### 1. Prepare Your Hosting Environment

#### For Shared Hosting (cPanel):

1. Log into your cPanel
2. Navigate to "MySQL Databases" or "Database Wizard"
3. Create a new database (e.g., `le_lagon_apartments`)
4. Create a database user with a strong password
5. Grant all privileges to the user for the database
6. Note down these credentials:
   - Database Name
   - Database Username
   - Database Password
   - Database Host (usually `localhost`)

### 2. Upload Files

#### Option A: Using FTP Client

1. Connect to your server via FTP
2. Upload all project files to your server
3. **Important**: Your domain should point to the `/public` directory

   **Directory Structure on Server:**
   ```
   /home/yourusername/
   ├── public_html/          ← Point domain here or upload to here
   │   ├── index.php
   │   ├── .htaccess
   │   └── assets/
   ├── app/
   ├── config/
   ├── database/
   └── ...
   ```

#### Option B: Using cPanel File Manager

1. Upload the entire project as a ZIP file
2. Extract it in your hosting account
3. Move contents appropriately so `/public` becomes your web root

### 3. Configure Database Settings

1. Navigate to `/config/database.php`
2. Update with your database credentials:

```php
define('DB_HOST', 'localhost');           // Usually 'localhost'
define('DB_NAME', 'le_lagon_apartments'); // Your database name
define('DB_USER', 'your_db_user');        // Your database username
define('DB_PASS', 'your_db_password');    // Your database password
```

3. Save the file

### 4. Import Database Schema

#### Using phpMyAdmin:

1. Log into phpMyAdmin from your cPanel
2. Select your database from the left sidebar
3. Click on the "Import" tab
4. Click "Choose File" and select `/database/schema.sql`
5. Click "Go" to import
6. Wait for success message
7. Repeat for `/database/sample_data.sql` (optional, provides demo content)

#### Using MySQL Command Line:

```bash
mysql -u your_username -p your_database_name < database/schema.sql
mysql -u your_username -p your_database_name < database/sample_data.sql
```

### 5. Set File Permissions

If you have SSH access:

```bash
chmod 755 public/
chmod 644 public/index.php
chmod 644 public/.htaccess
chmod 755 logs/
chmod 666 logs/error.log
```

Via cPanel File Manager:
1. Right-click on each file/folder
2. Select "Change Permissions"
3. Set as shown above

### 6. Configure .htaccess (if needed)

The `.htaccess` file in `/public` should work by default. If you experience issues:

1. Ensure `mod_rewrite` is enabled (contact your host if unsure)
2. If your site is in a subdirectory, update `RewriteBase` in `.htaccess`:

```apache
RewriteBase /subdirectory/
```

### 7. Test the Installation

1. **Visit Your Website**: Open your domain in a browser
   - You should see the hotel homepage
   - If you see a blank page, check error logs

2. **Access Admin Panel**: Navigate to `http://yourdomain.com/admin`
   - Default credentials:
     - Username: `admin`
     - Password: `admin123`

3. **Change Default Password** (Important!):
   - This should be done immediately for security

### 8. Verify Database Connection

If you see errors:

1. Check database credentials in `/config/database.php`
2. Ensure database was imported successfully
3. Verify database user has proper permissions
4. Check error logs at `/logs/error.log`

## Troubleshooting

### 404 Error on All Pages

**Problem**: Homepage works but other pages show 404

**Solution**:
1. Ensure `mod_rewrite` is enabled
2. Check `.htaccess` is in the correct location (`/public/.htaccess`)
3. Contact your hosting provider to enable `AllowOverride All`

### Database Connection Error

**Problem**: "Database connection failed" message

**Solution**:
1. Verify credentials in `/config/database.php`
2. Check if database exists
3. Ensure database user has privileges
4. Try changing `DB_HOST` from `localhost` to `127.0.0.1`

### Blank White Page

**Problem**: Page loads but shows nothing

**Solution**:
1. Enable error display temporarily in `/public/index.php`:
   ```php
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
   ```
2. Check PHP error logs
3. Ensure all files were uploaded
4. Verify PHP version (7.4 or higher required)

### Images Not Loading

**Problem**: Website loads but images don't display

**Solution**:
1. Verify assets folder is in `/public/assets/`
2. Check file permissions on assets folder (755)
3. Look at browser console for 404 errors
4. Ensure correct paths in database

### Cannot Access Admin Panel

**Problem**: /admin redirects or shows error

**Solution**:
1. Verify database tables were created (check `admin_users` table)
2. Ensure sample data was imported (includes default admin user)
3. Check if sessions are working (contact host if needed)

## Post-Installation Steps

### 1. Security Hardening

1. **Change Admin Password**:
   - Login to admin panel
   - Navigate to Settings
   - Change password

2. **Update Site Settings**:
   - Go to Admin > Settings
   - Update site name, email, phone, address
   - Save changes

3. **Secure Database Credentials**:
   - Ensure `/config/database.php` is not web-accessible
   - The `.htaccess` rules should prevent this

### 2. Content Management

1. **Update Hero Slider**:
   - Admin > Hero Slider
   - Edit slides with your images and text

2. **Customize About Section**:
   - Admin > About Section
   - Update content and images

3. **Manage Rooms**:
   - Admin > Rooms
   - Add/edit room listings

4. **Configure Services**:
   - Admin > Services
   - Update pricing and features

5. **Update Footer**:
   - Admin > Footer
   - Customize footer content

### 3. Testing

- [ ] Test all menu links
- [ ] Verify contact form works
- [ ] Check mobile responsiveness
- [ ] Test admin login/logout
- [ ] Verify all images load correctly
- [ ] Test booking functionality

## Maintenance

### Regular Backups

1. **Database Backup**:
   - Use phpMyAdmin Export feature
   - Or automated cPanel backup
   - Schedule weekly backups

2. **File Backup**:
   - Download entire site periodically
   - Keep backups offsite

### Updates

1. **Keep PHP Updated**: Ensure your host uses latest stable PHP
2. **Database Maintenance**: Optimize tables monthly
3. **Monitor Error Logs**: Check `/logs/error.log` regularly

## Additional Configuration

### Email Setup

To enable contact form email functionality, you'll need to:

1. Configure SMTP settings
2. Add email sending code to HomeController
3. Use PHPMailer or similar library

### SSL Certificate

1. Install SSL certificate (usually free with cPanel - Let's Encrypt)
2. Update site URLs to use HTTPS
3. Force HTTPS redirect in `.htaccess`

## Getting Help

If you encounter issues not covered here:

1. Check PHP error logs: `/logs/error.log`
2. Enable debug mode temporarily
3. Verify all installation steps were followed
4. Contact your hosting provider for server-specific issues

## Success!

Once everything is set up:
- ✅ Website is accessible
- ✅ Admin panel is working
- ✅ Database is connected
- ✅ All pages load correctly
- ✅ Images and assets display properly

You now have a fully functional, customizable hotel/apartment booking website!

---

**Important Notes:**
- Always keep backups before making changes
- Never share database credentials
- Change default admin password immediately
- Test thoroughly before going live
- Keep PHP and MySQL up to date
