# 🚀 Quick Start Guide - CMS Features

## Overview
The Le Lagon Apartments now has a fully functional CMS (Content Management System) for managing all web content through the admin dashboard.

## 📍 Access the CMS

1. **Login to Admin Panel**
   ```
   URL: http://yourdomain.com/admin/login
   Default: admin / admin123
   ```

2. **Navigate to CMS**
   - Click on "CMS" in the left sidebar menu
   - You'll see 3 main sections:
     - Logo & Favicon
     - Navigation Menu
     - Hero Section

## 🎨 How to Use Each Feature

### 1. Update Logo & Favicon

**Path:** Admin Dashboard → CMS → Logo & Favicon

**Steps:**
1. Click "Choose File" under "Upload New Logo"
2. Select your logo image (recommended: 200x60px PNG)
3. Enter alt text for accessibility
4. Click "Choose File" under "Upload New Favicon"
5. Select your favicon (recommended: 32x32px ICO or PNG)
6. Click "Save Changes"

**Result:** Logo and favicon updated immediately!

### 2. Manage Navigation Menu

**Path:** Admin Dashboard → CMS → Navigation Menu

**To Create a Menu:**
1. Click "Add New Menu Item"
2. Enter menu title (e.g., "About Us")
3. Enter menu URL (e.g., "/about")
4. Set order number (lower = appears first)
5. Check "Active" to make it visible
6. Click "Create Menu Item"

**To Edit a Menu:**
1. Click "Edit" button next to any menu
2. Update fields in the popup
3. Click "Update Menu Item"

**To Delete a Menu:**
1. Click "Delete" button
2. Confirm the action

### 3. Manage Hero Section

**Path:** Admin Dashboard → CMS → Hero Section

**To Add a Hero Slide:**
1. Click "Add New Hero Slide"
2. Upload background image (1920x1080px recommended)
3. Enter title (required)
4. Enter subtitle (optional)
5. Enter description (optional)
6. Enter button text and link (optional)
7. Set slider order
8. Check "Active" to display
9. Click "Create Hero Slide"

**To Edit a Hero Slide:**
1. Click "Edit" button
2. Update any fields
3. Upload new image (optional)
4. Click "Update Hero Slide"

**To Delete a Hero Slide:**
1. Click "Delete" button
2. Confirm deletion

## 📱 Mobile Access

The admin dashboard is fully responsive!

**On Mobile/Tablet:**
- Tap the menu icon (☰) in the top-left corner
- Sidebar slides in from the left
- Tap outside to close

## 💡 Tips & Best Practices

### Logo
- Use PNG format with transparent background
- Keep file size under 500KB
- Recommended size: 200x60px

### Favicon
- Use ICO or PNG format
- Must be square (32x32px or 16x16px)
- Keep it simple and recognizable

### Navigation Menu
- Start URLs with "/" (e.g., /about, not about)
- Use clear, descriptive titles
- Keep menu order logical (Home=0, About=1, etc.)
- Test all links after creating

### Hero Slider
- Use high-quality images (min 1920x1080px)
- Optimize images before upload (recommended <2MB)
- Keep titles short and impactful
- Set slider order to control sequence
- Use descriptive button text ("Book Now", not "Click Here")

## 🔍 Troubleshooting

### Image Won't Upload
**Issue:** File upload fails  
**Solution:** 
- Check file format (only JPG, PNG, GIF, WebP allowed)
- Reduce file size (max 5MB recommended)
- Check server permissions on uploads/ directory

### Menu Not Showing
**Issue:** Created menu doesn't appear  
**Solution:**
- Ensure "Active" is checked
- Verify URL starts with "/"
- Check if frontend code displays menu

### Hero Slide Missing
**Issue:** Hero slide not displaying  
**Solution:**
- Ensure "Active" is checked
- Verify image uploaded successfully
- Check slider order (lower numbers first)

## 🆘 Need Help?

**Documentation Files:**
- `CMS_FEATURES.md` - Complete feature guide
- `IMPLEMENTATION_SUMMARY.md` - Technical details
- `README.md` - Project overview

**Check Logs:**
```bash
tail -f logs/error.log
```

**Run Validation:**
```bash
php validate_cms.php
```

## ✅ Quick Checklist

Before going live, make sure you've:
- [ ] Uploaded your logo
- [ ] Uploaded your favicon
- [ ] Created all navigation menu items
- [ ] Set up at least one hero slide
- [ ] Tested all links
- [ ] Previewed on mobile device
- [ ] Changed default admin password

## 🎯 Next Steps

After setting up CMS:
1. Update About Section (Admin → About Section)
2. Add Services (Admin → Services)
3. Create Room Listings (Admin → Rooms)
4. Configure Footer (Admin → Footer)
5. Set Site Settings (Admin → Settings)

---

**Version:** 1.0  
**Support:** Check documentation files for detailed help  
**Last Updated:** November 2024
