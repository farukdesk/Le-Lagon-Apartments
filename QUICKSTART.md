# Quick Start Guide

Get your Le Lagon Apartments CMS running in 5 minutes!

## 🚀 Express Setup (For Quick Testing)

### Step 1: Database Setup (2 minutes)

1. **Create Database**
   - Log into phpMyAdmin (usually at `yourdomain.com/phpmyadmin`)
   - Click "New" to create a database
   - Name it: `le_lagon_apartments`
   - Collation: `utf8mb4_unicode_ci`

2. **Import Schema**
   - Select your new database
   - Click "Import" tab
   - Choose file: `database/schema.sql`
   - Click "Go"

3. **Import Sample Data** (Optional - for demo content)
   - Stay in Import tab
   - Choose file: `database/sample_data.sql`
   - Click "Go"

### Step 2: Configure Database Connection (1 minute)

Edit `/config/database.php`:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'le_lagon_apartments');  // Your database name
define('DB_USER', 'your_username');         // Your MySQL username
define('DB_PASS', 'your_password');         // Your MySQL password
```

### Step 3: Upload Files (1 minute)

- Upload all files to your hosting
- Make sure `/public` folder is your web root
- Or use the `.htaccess` in root to redirect

### Step 4: Test Installation (30 seconds)

Visit: `http://yourdomain.com/public/check.php`

This will verify:
- ✅ PHP version
- ✅ Required extensions
- ✅ File permissions
- ✅ Database connection

### Step 5: Access Your Site (30 seconds)

**Frontend:** `http://yourdomain.com/`
**Admin Panel:** `http://yourdomain.com/admin`

**Default Login:**
- Username: `admin`
- Password: `admin123`

⚠️ **Change this password immediately!**

---

## 🎯 What's Next?

### Customize Content

1. **Site Settings** → Update name, email, phone, address
2. **Hero Slider** → Change homepage slider images and text
3. **About Section** → Edit your about us content
4. **Rooms** → Add/modify room listings with prices
5. **Services** → Update services and pricing
6. **Footer** → Customize footer information

### Add Your Content

All content is managed from the admin panel:
- No coding required
- Upload images (prepare beforehand)
- Edit text directly in forms
- Changes reflect immediately on site

---

## 📋 Checklist

- [ ] Database created
- [ ] Schema imported
- [ ] Sample data imported (optional)
- [ ] Database config updated
- [ ] Files uploaded
- [ ] System check passed
- [ ] Admin password changed
- [ ] Site settings updated
- [ ] Test all pages work
- [ ] Content customized

---

## 🆘 Common Issues

### "Database connection failed"
→ Check credentials in `config/database.php`
→ Ensure database exists

### "404 Not Found" on pages
→ Ensure mod_rewrite is enabled
→ Check .htaccess file exists

### Blank page
→ Enable error display in `public/index.php`
→ Check PHP error logs

### Images not loading
→ Verify assets folder is in `/public/assets/`
→ Check file paths in database

---

## 📚 Additional Resources

- **Full Documentation:** See `README.md`
- **Detailed Installation:** See `INSTALL.md`
- **System Check:** Run `public/check.php`

---

## 🎉 You're Done!

Your hotel/apartment booking CMS is now live!

**Remember to:**
- Keep regular backups
- Update admin password
- Customize content
- Test all functionality
- Enable SSL for production

Enjoy your new CMS! 🏨
