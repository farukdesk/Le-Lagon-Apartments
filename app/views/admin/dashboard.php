<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Admin Dashboard'; ?></title>
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/fontawesome-pro.css">
    <style>
        body {
            background: #f5f6fa;
            font-family: 'Arial', sans-serif;
        }
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
        }
        .sidebar h3 {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            padding: 12px 15px;
            display: block;
            border-radius: 8px;
            transition: background 0.3s;
        }
        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background: rgba(255,255,255,0.2);
        }
        .main-content {
            margin-left: 250px;
            padding: 30px;
        }
        .header {
            background: white;
            padding: 20px 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
            color: #333;
            font-size: 28px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .stat-card h3 {
            margin: 0 0 10px 0;
            color: #666;
            font-size: 14px;
            text-transform: uppercase;
        }
        .stat-card .value {
            font-size: 32px;
            font-weight: bold;
            color: #667eea;
        }
        .quick-actions {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .quick-actions h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .action-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
        .action-btn {
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            text-align: center;
            transition: transform 0.3s;
            display: block;
        }
        .action-btn:hover {
            transform: translateY(-3px);
            color: white;
        }
        .action-btn i {
            display: block;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
            color: white;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>Le Lagon CMS</h3>
        <ul>
            <li><a href="/admin/dashboard" class="active"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/admin/slider"><i class="fa fa-images"></i> Hero Slider</a></li>
            <li><a href="/admin/about"><i class="fa fa-info-circle"></i> About Section</a></li>
            <li><a href="/admin/services"><i class="fa fa-concierge-bell"></i> Services</a></li>
            <li><a href="/admin/rooms"><i class="fa fa-bed"></i> Rooms</a></li>
            <li><a href="/admin/footer"><i class="fa fa-align-justify"></i> Footer</a></li>
            <li><a href="/admin/settings"><i class="fa fa-cog"></i> Settings</a></li>
            <li><a href="/admin/logout" class="logout-btn"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
    </div>
    
    <div class="main-content">
        <div class="header">
            <h1>Dashboard</h1>
            <div>
                Welcome, <?php echo htmlspecialchars($adminName ?? 'Admin'); ?>
            </div>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Hero Slides</h3>
                <div class="value">3</div>
            </div>
            <div class="stat-card">
                <h3>Total Rooms</h3>
                <div class="value">3</div>
            </div>
            <div class="stat-card">
                <h3>Services</h3>
                <div class="value">4</div>
            </div>
            <div class="stat-card">
                <h3>Bookings</h3>
                <div class="value">0</div>
            </div>
        </div>
        
        <div class="quick-actions">
            <h2>Quick Actions</h2>
            <div class="action-buttons">
                <a href="/admin/slider" class="action-btn">
                    <i class="fa fa-images"></i>
                    <div>Manage Hero Slider</div>
                </a>
                <a href="/admin/about" class="action-btn">
                    <i class="fa fa-info-circle"></i>
                    <div>Edit About Section</div>
                </a>
                <a href="/admin/services" class="action-btn">
                    <i class="fa fa-concierge-bell"></i>
                    <div>Manage Services</div>
                </a>
                <a href="/admin/rooms" class="action-btn">
                    <i class="fa fa-bed"></i>
                    <div>Manage Rooms</div>
                </a>
                <a href="/admin/footer" class="action-btn">
                    <i class="fa fa-align-justify"></i>
                    <div>Edit Footer</div>
                </a>
                <a href="/admin/settings" class="action-btn">
                    <i class="fa fa-cog"></i>
                    <div>Site Settings</div>
                </a>
            </div>
        </div>
        
        <div style="margin-top: 30px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h3>Getting Started</h3>
            <ol>
                <li><strong>Database Setup:</strong> Import the database schema from <code>/database/schema.sql</code> and sample data from <code>/database/sample_data.sql</code></li>
                <li><strong>Configuration:</strong> Update database credentials in <code>/config/database.php</code></li>
                <li><strong>Content Management:</strong> Use the menu to customize each section of your website</li>
                <li><strong>View Website:</strong> <a href="/" target="_blank">Click here to view the live site</a></li>
            </ol>
            <p style="margin-top: 15px; padding: 15px; background: #fff3cd; border-left: 4px solid #ffc107; border-radius: 4px;">
                <strong>Note:</strong> This is a fully functional CMS. All content displayed on the frontend can be managed through this admin panel. Each section (header, hero slider, about, services, rooms, footer) is stored in the database and can be customized without touching any code.
            </p>
        </div>
    </div>
</body>
</html>
