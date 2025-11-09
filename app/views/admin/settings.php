<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Manage Hero Slider'; ?></title>
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/fontawesome-pro.css">
    <style>
        body { background: #f5f6fa; font-family: 'Arial', sans-serif; }
        .sidebar { position: fixed; top: 0; left: 0; height: 100vh; width: 250px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; box-shadow: 2px 0 10px rgba(0,0,0,0.1); }
        .sidebar h3 { margin-bottom: 30px; padding-bottom: 20px; border-bottom: 1px solid rgba(255,255,255,0.2); }
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li { margin-bottom: 10px; }
        .sidebar ul li a { color: white; text-decoration: none; padding: 12px 15px; display: block; border-radius: 8px; transition: background 0.3s; }
        .sidebar ul li a:hover { background: rgba(255,255,255,0.2); }
        .main-content { margin-left: 250px; padding: 30px; }
        .header { background: white; padding: 20px 30px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .content-box { background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        table { width: 100%; }
        th { background: #667eea; color: white; padding: 12px; text-align: left; }
        td { padding: 12px; border-bottom: 1px solid #ddd; }
        .btn { padding: 8px 16px; border-radius: 5px; text-decoration: none; display: inline-block; margin-right: 5px; }
        .btn-primary { background: #667eea; color: white; }
        .btn-success { background: #28a745; color: white; }
        .btn-danger { background: #dc3545; color: white; }
    </style>
</head>
<body>
    <div class="sidebar">
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
    
    <div class="main-content">
        <div class="header">
            <h1>Manage Hero Slider</h1>
        </div>
        
        <div class="content-box">
            <div style="margin-bottom: 20px;">
                <a href="#" class="btn btn-success"><i class="fa fa-plus"></i> Add New Slide</a>
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($slides)): ?>
                        <?php foreach ($slides as $slide): ?>
                            <tr>
                                <td><?php echo $slide['id']; ?></td>
                                <td><?php echo htmlspecialchars($slide['title']); ?></td>
                                <td><img src="/<?php echo htmlspecialchars($slide['image_path']); ?>" style="width: 100px; height: 60px; object-fit: cover;"></td>
                                <td><?php echo $slide['slider_order']; ?></td>
                                <td><?php echo $slide['is_active'] ? '<span style="color: green;">Active</span>' : '<span style="color: red;">Inactive</span>'; ?></td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" style="text-align: center;">No slides found. Import sample data from database/sample_data.sql</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            
            <p style="margin-top: 20px; padding: 15px; background: #e7f3ff; border-left: 4px solid #2196F3;">
                <strong>Note:</strong> This is a placeholder admin page. To make it fully functional, you would need to:
                <ul>
                    <li>Add forms for creating/editing slides</li>
                    <li>Implement AJAX or form submission handlers</li>
                    <li>Add image upload functionality</li>
                    <li>Implement delete confirmation</li>
                </ul>
                The database structure and models are already in place to support all these operations.
            </p>
        </div>
    </div>
</body>
</html>
