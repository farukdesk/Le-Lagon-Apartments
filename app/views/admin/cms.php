<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'CMS Management'; ?></title>
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
        .sidebar.hidden { transform: translateX(-100%); }
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
        
        /* Main content */
        .main-content { 
            margin-left: 250px; 
            padding: 30px;
            transition: margin-left 0.3s ease;
        }
        .main-content.expanded { margin-left: 0; }
        
        .header { 
            background: white; 
            padding: 20px 30px; 
            border-radius: 10px; 
            margin-bottom: 30px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); 
        }
        .header h1 { margin: 0; color: #333; font-size: 1.8rem; }
        
        .cms-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .cms-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
            color: inherit;
            display: block;
        }
        .cms-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            text-decoration: none;
        }
        .cms-card i {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 15px;
        }
        .cms-card h3 {
            margin: 15px 0 10px;
            color: #333;
            font-size: 1.3rem;
        }
        .cms-card p {
            color: #666;
            margin: 0;
            font-size: 0.9rem;
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            .menu-toggle { display: block; }
            .sidebar { transform: translateX(-100%); }
            .sidebar.active { transform: translateX(0); }
            .main-content { margin-left: 0; padding: 20px; padding-top: 60px; }
            .header h1 { font-size: 1.5rem; }
            .cms-grid { grid-template-columns: 1fr; gap: 15px; }
            .cms-card { padding: 20px; }
        }
        
        @media (max-width: 480px) {
            .header { padding: 15px 20px; }
            .cms-card i { font-size: 2.5rem; }
            .cms-card h3 { font-size: 1.1rem; }
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
            <li><a href="/admin/cms" class="active"><i class="fa fa-edit"></i> CMS</a></li>
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
            <h1>CMS Management</h1>
            <p style="margin: 10px 0 0 0; color: #666;">Manage all your website content from one place</p>
        </div>
        
        <div class="cms-grid">
            <a href="/admin/cms/logo" class="cms-card">
                <i class="fa fa-image"></i>
                <h3>Logo & Favicon</h3>
                <p>Update website logo and favicon</p>
            </a>
            
            <a href="/admin/cms/menu" class="cms-card">
                <i class="fa fa-bars"></i>
                <h3>Navigation Menu</h3>
                <p>Create, edit, and delete menu items</p>
            </a>
            
            <a href="/admin/cms/hero" class="cms-card">
                <i class="fa fa-photo"></i>
                <h3>Hero Section</h3>
                <p>Manage hero background images and titles</p>
            </a>
        </div>
        
        <div style="background: #e7f3ff; border-left: 4px solid #2196F3; padding: 20px; border-radius: 8px; margin-top: 30px;">
            <h4 style="margin-top: 0; color: #333;">
                <i class="fa fa-info-circle"></i> CMS Features
            </h4>
            <ul style="margin: 10px 0; color: #666;">
                <li>Update your site logo and favicon with ease</li>
                <li>Create and manage navigation menu items</li>
                <li>Control hero section images and content</li>
                <li>All changes are instantly reflected on your website</li>
            </ul>
        </div>
    </div>
    
    <script>
        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            sidebar.classList.toggle('active');
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
    </script>
</body>
</html>
