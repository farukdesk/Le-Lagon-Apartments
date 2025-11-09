<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Manage Logo & Favicon'; ?></title>
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/fontawesome-pro.css">
    <style>
        body { background: #f5f6fa; font-family: 'Arial', sans-serif; margin: 0; padding: 0; }
        
        /* Responsive Sidebar */
        .sidebar { 
            position: fixed; 
            top: 0; 
            left: 0; 
            height: 100vh; 
            width: 250px; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            color: white; 
            padding: 20px; 
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }
        .sidebar h3 { margin-bottom: 30px; padding-bottom: 20px; border-bottom: 1px solid rgba(255,255,255,0.2); font-size: 1.2rem; }
        .sidebar ul { list-style: none; padding: 0; margin: 0; }
        .sidebar ul li { margin-bottom: 10px; }
        .sidebar ul li a { 
            color: white; 
            text-decoration: none; 
            padding: 12px 15px; 
            display: block; 
            border-radius: 8px; 
            transition: background 0.3s;
            font-size: 0.9rem;
        }
        .sidebar ul li a:hover, .sidebar ul li a.active { background: rgba(255,255,255,0.2); }
        .sidebar ul li a i { margin-right: 8px; width: 20px; }
        
        /* Mobile menu toggle */
        .menu-toggle {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1001;
            background: #667eea;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            display: none;
        }
        
        .main-content { 
            margin-left: 250px; 
            padding: 30px;
            transition: margin-left 0.3s ease;
        }
        .header { 
            background: white; 
            padding: 20px 30px; 
            border-radius: 10px; 
            margin-bottom: 30px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); 
        }
        .header h1 { margin: 0; color: #333; font-size: 1.8rem; }
        .content-box { 
            background: white; 
            padding: 25px; 
            border-radius: 10px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); 
            margin-bottom: 20px;
        }
        .form-group { margin-bottom: 20px; }
        .form-group label { 
            display: block; 
            margin-bottom: 8px; 
            color: #333; 
            font-weight: 600;
        }
        .form-control { 
            width: 100%; 
            padding: 10px; 
            border: 1px solid #ddd; 
            border-radius: 5px; 
            font-size: 14px;
            box-sizing: border-box;
        }
        .btn { 
            padding: 10px 20px; 
            border-radius: 5px; 
            text-decoration: none; 
            display: inline-block; 
            margin-right: 10px; 
            border: none;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s;
        }
        .btn-primary { background: #667eea; color: white; }
        .btn-primary:hover { background: #5568d3; }
        .btn-secondary { background: #6c757d; color: white; }
        .btn-secondary:hover { background: #5a6268; }
        
        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .alert-success {
            background: #d4edda;
            border-left: 4px solid #28a745;
            color: #155724;
        }
        .alert-error {
            background: #f8d7da;
            border-left: 4px solid #dc3545;
            color: #721c24;
        }
        
        .preview-box {
            margin-top: 10px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
            text-align: center;
        }
        .preview-box img {
            max-width: 200px;
            max-height: 100px;
            object-fit: contain;
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            .menu-toggle { display: block; }
            .sidebar { transform: translateX(-100%); }
            .sidebar.active { transform: translateX(0); }
            .main-content { margin-left: 0; padding: 20px; padding-top: 60px; }
            .header h1 { font-size: 1.5rem; }
            .content-box { padding: 20px; }
            .btn { width: 100%; margin-bottom: 10px; }
        }
        
        @media (max-width: 480px) {
            .header { padding: 15px 20px; }
            .preview-box img { max-width: 150px; max-height: 75px; }
        }
    </style>
</head>
<body>
    <button class="menu-toggle" onclick="toggleMenu()">
        <i class="fa fa-bars"></i> Menu
    </button>
    
    <div class="sidebar" id="sidebar">
        <h3>Le Lagon CMS</h3>
        <ul>
            <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/admin/cms"><i class="fa fa-edit"></i> CMS</a></li>
            <li><a href="/admin/slider"><i class="fa fa-images"></i> Hero Slider</a></li>
            <li><a href="/admin/about"><i class="fa fa-info-circle"></i> About Section</a></li>
            <li><a href="/admin/services"><i class="fa fa-concierge-bell"></i> Services</a></li>
            <li><a href="/admin/rooms"><i class="fa fa-bed"></i> Rooms</a></li>
            <li><a href="/admin/footer"><i class="fa fa-align-justify"></i> Footer</a></li>
            <li><a href="/admin/settings"><i class="fa fa-cog"></i> Settings</a></li>
            <li><a href="/admin/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
    </div>
    
    <div class="main-content" id="mainContent">
        <div class="header">
            <h1>Manage Logo & Favicon</h1>
            <p style="margin: 10px 0 0 0; color: #666;">Upload and update your website logo and favicon</p>
        </div>
        
        <?php if (!empty($success)): ?>
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i> <?php echo htmlspecialchars($success); ?>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($error)): ?>
            <div class="alert alert-error">
                <i class="fa fa-exclamation-circle"></i> <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="/admin/cms/logo/update" enctype="multipart/form-data">
            <div class="content-box">
                <h3 style="margin-top: 0; color: #667eea;">
                    <i class="fa fa-image"></i> Website Logo
                </h3>
                
                <?php if (!empty($header['logo_path'])): ?>
                    <div class="preview-box">
                        <p style="margin: 0 0 10px 0; color: #666;">Current Logo:</p>
                        <img src="/<?php echo htmlspecialchars($header['logo_path']); ?>" alt="Current Logo">
                    </div>
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="logo">Upload New Logo</label>
                    <input type="file" id="logo" name="logo" class="form-control" accept="image/*">
                    <small style="color: #666; display: block; margin-top: 5px;">
                        Accepted formats: JPG, PNG, GIF, WebP. Recommended size: 200x60px
                    </small>
                </div>
                
                <div class="form-group">
                    <label for="logo_alt">Logo Alt Text</label>
                    <input type="text" id="logo_alt" name="logo_alt" class="form-control" 
                           value="<?php echo htmlspecialchars($header['logo_alt'] ?? ''); ?>" 
                           placeholder="Le Lagon Apartments">
                    <small style="color: #666; display: block; margin-top: 5px;">
                        Alternative text for accessibility and SEO
                    </small>
                </div>
            </div>
            
            <div class="content-box">
                <h3 style="margin-top: 0; color: #667eea;">
                    <i class="fa fa-star"></i> Website Favicon
                </h3>
                
                <?php if (!empty($favicon)): ?>
                    <div class="preview-box">
                        <p style="margin: 0 0 10px 0; color: #666;">Current Favicon:</p>
                        <img src="/<?php echo htmlspecialchars($favicon); ?>" alt="Current Favicon" style="max-width: 32px; max-height: 32px;">
                    </div>
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="favicon">Upload New Favicon</label>
                    <input type="file" id="favicon" name="favicon" class="form-control" accept="image/*,.ico">
                    <small style="color: #666; display: block; margin-top: 5px;">
                        Accepted formats: ICO, PNG. Recommended size: 32x32px or 16x16px
                    </small>
                </div>
            </div>
            
            <div style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save Changes
                </button>
                <a href="/admin/cms" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back to CMS
                </a>
            </div>
        </form>
    </div>
    
    <script>
        function toggleMenu() {
            document.getElementById('sidebar').classList.toggle('active');
        }
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.querySelector('.menu-toggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !menuToggle.contains(event.target) &&
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
        
        // Preview image before upload
        document.getElementById('logo').addEventListener('change', function(e) {
            previewImage(e.target, 'logo-preview');
        });
        
        document.getElementById('favicon').addEventListener('change', function(e) {
            previewImage(e.target, 'favicon-preview');
        });
        
        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById(previewId);
                    if (preview) {
                        preview.src = e.target.result;
                    }
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
