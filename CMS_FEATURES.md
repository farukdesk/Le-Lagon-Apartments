# CMS Content Management Features

## Overview
The Le Lagon Apartments CMS now includes a comprehensive content management system that allows administrators to manage all web content through an intuitive admin interface.

## CMS Features

### 1. Logo & Favicon Management
**Access:** Admin Dashboard → CMS → Logo & Favicon

- **Upload Logo**: Upload your website logo (JPG, PNG, GIF, WebP)
- **Upload Favicon**: Upload your website favicon (ICO, PNG)
- **Logo Alt Text**: Set alternative text for accessibility and SEO
- **Image Preview**: View current logo and favicon before updating

**Recommended Sizes:**
- Logo: 200x60px
- Favicon: 32x32px or 16x16px

### 2. Navigation Menu Management
**Access:** Admin Dashboard → CMS → Navigation Menu

Full CRUD (Create, Read, Update, Delete) operations for menu items:

- **Create Menu**: Add new menu items with title, URL, order, and status
- **Edit Menu**: Update existing menu items via modal dialog
- **Delete Menu**: Remove menu items with confirmation
- **Reorder**: Set menu order for display sequence
- **Active/Inactive**: Toggle menu visibility

**Fields:**
- Menu Title (required)
- Menu URL (required, e.g., /about, /rooms)
- Order (numeric, default: 0)
- Active Status (checkbox)

### 3. Hero Slider Management
**Access:** Admin Dashboard → CMS → Hero Section

Complete management of hero section slides:

- **Create Hero Slide**: Add new slides with images and content
- **Edit Hero Slide**: Update existing slides (keep or replace image)
- **Delete Hero Slide**: Remove slides with confirmation
- **Image Upload**: Upload hero background images
- **Content Management**: 
  - Title (required)
  - Subtitle
  - Description
  - Button Text
  - Button Link
  - Slider Order
  - Active/Inactive status

**Recommended Image Size:**
- Hero Background: 1920x1080px or larger

## Responsive Admin Dashboard

The admin dashboard is now fully responsive and mobile-friendly:

- **Desktop (>768px)**: Full sidebar navigation
- **Tablet/Mobile (≤768px)**: Hamburger menu with slide-out sidebar
- **Touch-Friendly**: All buttons and controls optimized for touch
- **Adaptive Layouts**: Grid layouts adjust for optimal viewing on any device

### Mobile Features:
- Hamburger menu button in top-left corner
- Tap to open sidebar navigation
- Auto-close sidebar when clicking outside
- Optimized form layouts for mobile devices
- Responsive tables with horizontal scroll

## File Upload System

The CMS includes a secure file upload system:

**Upload Directories:**
```
uploads/
├── logo/      # Website logos
├── favicon/   # Website favicons
└── hero/      # Hero slider background images
```

**Security Features:**
- File type validation (only images allowed)
- Unique filename generation (prevents overwrites)
- Proper file permissions (755 for directories)
- Secure file handling with move_uploaded_file()

**Accepted File Types:**
- Images: JPG, JPEG, PNG, GIF, WebP
- Favicon: ICO, PNG

## How to Use

### Accessing the CMS
1. Log in to the admin panel at `/admin/login`
2. Click on "CMS" in the sidebar menu
3. Choose the section you want to manage

### Managing Logo & Favicon
1. Navigate to CMS → Logo & Favicon
2. Click "Choose File" to select your logo or favicon
3. (Optional) Update the logo alt text
4. Click "Save Changes"
5. View the preview to confirm changes

### Managing Navigation Menu
1. Navigate to CMS → Navigation Menu
2. Click "Add New Menu Item" to create a new menu
3. Fill in the required fields (Title, URL)
4. Set the order and status
5. Click "Create Menu Item"

**To Edit:**
- Click the "Edit" button next to any menu item
- Update the fields in the modal dialog
- Click "Update Menu Item"

**To Delete:**
- Click the "Delete" button
- Confirm the deletion in the alert dialog

### Managing Hero Slider
1. Navigate to CMS → Hero Section
2. Click "Add New Hero Slide"
3. Upload a hero background image (required)
4. Fill in the title (required) and optional fields
5. Set the slider order (lower numbers appear first)
6. Click "Create Hero Slide"

**To Edit:**
- Click "Edit" next to any slide
- Update the fields (upload new image if needed)
- Click "Update Hero Slide"

**To Delete:**
- Click "Delete" next to any slide
- Confirm deletion

## Database Tables

The CMS uses the following database tables:

- `site_settings` - Stores site-wide settings (favicon path)
- `header_content` - Stores logo information
- `navigation_menu` - Stores menu items
- `hero_slider` - Stores hero slider slides

## Success & Error Messages

The CMS provides feedback for all operations:

- **Success Messages** (green): Action completed successfully
- **Error Messages** (red): Action failed with reason

Messages are displayed at the top of the page after form submission.

## Permissions

Ensure the uploads directory has proper permissions:

```bash
chmod -R 755 uploads/
```

## Best Practices

1. **Logo**: Use a transparent PNG for best results
2. **Favicon**: Use a square image (32x32px or 16x16px)
3. **Hero Images**: Use high-resolution images (1920x1080px minimum)
4. **File Sizes**: Optimize images before uploading (recommended < 2MB)
5. **Menu URLs**: Always start with `/` (e.g., `/about`, not `about`)
6. **Testing**: Preview your website after making changes

## Troubleshooting

### Upload Issues
- **Problem**: File upload fails
- **Solution**: Check directory permissions (755) and file size limits in php.ini

### Menu Not Showing
- **Problem**: Menu items not appearing on website
- **Solution**: Ensure "Active" is checked and verify the frontend code includes menu display

### Hero Slider Issues
- **Problem**: Slider not updating on frontend
- **Solution**: Check that slides are marked as "Active" and verify frontend slider implementation

## Security

The CMS includes several security features:

- **Authentication Required**: All CMS actions require admin login
- **File Type Validation**: Only allowed image types can be uploaded
- **SQL Injection Protection**: Uses PDO prepared statements
- **XSS Prevention**: All output is HTML-escaped
- **CSRF Protection**: Session-based validation

## Future Enhancements

Potential future improvements:

- [ ] Image cropping/resizing tool
- [ ] Bulk upload for multiple images
- [ ] Image optimization on upload
- [ ] Multi-language menu support
- [ ] Menu drag-and-drop reordering
- [ ] Hero slider preview
- [ ] Revision history for content changes

## Support

For issues or questions:
1. Check the error logs in `/logs/error.log`
2. Verify database connection in `/config/database.php`
3. Review the README.md for system requirements
4. Check file and directory permissions

---

**Version:** 1.0  
**Last Updated:** November 2024  
**Compatibility:** PHP 7.4+, MySQL 5.7+
