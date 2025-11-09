<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Manage Navigation Menu'; ?></title>
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
        .table-responsive {
            overflow-x: auto;
        }
        table { 
            width: 100%;
            border-collapse: collapse;
        }
        th { 
            background: #667eea; 
            color: white; 
            padding: 12px; 
            text-align: left;
            font-size: 14px;
        }
        td { 
            padding: 12px; 
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }
        .btn { 
            padding: 8px 16px; 
            border-radius: 5px; 
            text-decoration: none; 
            display: inline-block; 
            margin-right: 5px;
            margin-bottom: 5px;
            border: none;
            cursor: pointer;
            font-size: 13px;
            transition: background 0.3s;
        }
        .btn-sm { padding: 6px 12px; font-size: 12px; }
        .btn-primary { background: #667eea; color: white; }
        .btn-primary:hover { background: #5568d3; }
        .btn-success { background: #28a745; color: white; }
        .btn-success:hover { background: #218838; }
        .btn-danger { background: #dc3545; color: white; }
        .btn-danger:hover { background: #c82333; }
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
        
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            overflow-y: auto;
        }
        .modal-content {
            background: white;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            width: 90%;
        }
        .modal-header {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #ddd;
        }
        .modal-header h2 {
            margin: 0;
            color: #333;
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
        .checkbox-wrapper {
            display: flex;
            align-items: center;
        }
        .checkbox-wrapper input[type="checkbox"] {
            margin-right: 8px;
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            .menu-toggle { display: block; }
            .sidebar { transform: translateX(-100%); }
            .sidebar.active { transform: translateX(0); }
            .main-content { margin-left: 0; padding: 20px; padding-top: 60px; }
            .header h1 { font-size: 1.5rem; }
            .content-box { padding: 20px; }
            table { font-size: 12px; }
            th, td { padding: 8px; }
            .modal-content { margin: 20px auto; padding: 20px; }
        }
        
        @media (max-width: 480px) {
            .header { padding: 15px 20px; }
            .btn { padding: 6px 12px; font-size: 11px; }
            th, td { padding: 6px; font-size: 11px; }
            .table-responsive { font-size: 12px; }
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
            <h1>Manage Navigation Menu</h1>
            <p style="margin: 10px 0 0 0; color: #666;">Create, edit, and delete menu items</p>
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
        
        <div class="content-box">
            <div style="margin-bottom: 20px;">
                <button onclick="openCreateModal()" class="btn btn-success">
                    <i class="fa fa-plus"></i> Add New Menu Item
                </button>
                <a href="/admin/cms" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back to CMS
                </a>
            </div>
            
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>URL</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($menus)): ?>
                            <?php foreach ($menus as $menu): ?>
                                <tr>
                                    <td><?php echo $menu['id']; ?></td>
                                    <td><?php echo htmlspecialchars($menu['menu_title']); ?></td>
                                    <td><?php echo htmlspecialchars($menu['menu_url']); ?></td>
                                    <td><?php echo $menu['menu_order']; ?></td>
                                    <td>
                                        <?php if ($menu['is_active']): ?>
                                            <span style="color: green; font-weight: 600;">Active</span>
                                        <?php else: ?>
                                            <span style="color: red; font-weight: 600;">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button onclick='openEditModal(<?php echo json_encode($menu); ?>)' class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button onclick="confirmDelete(<?php echo $menu['id']; ?>, '<?php echo htmlspecialchars($menu['menu_title']); ?>')" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="text-align: center; color: #666;">
                                    No menu items found. Click "Add New Menu Item" to create one.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Create Modal -->
    <div id="createModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fa fa-plus"></i> Add New Menu Item</h2>
            </div>
            <form method="POST" action="/admin/cms/menu/create">
                <div class="form-group">
                    <label for="create_menu_title">Menu Title *</label>
                    <input type="text" id="create_menu_title" name="menu_title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="create_menu_url">Menu URL *</label>
                    <input type="text" id="create_menu_url" name="menu_url" class="form-control" placeholder="/about" required>
                </div>
                <div class="form-group">
                    <label for="create_menu_order">Order</label>
                    <input type="number" id="create_menu_order" name="menu_order" class="form-control" value="0">
                </div>
                <div class="form-group">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" id="create_is_active" name="is_active" checked>
                        <label for="create_is_active" style="margin: 0;">Active</label>
                    </div>
                </div>
                <div style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Create Menu Item
                    </button>
                    <button type="button" onclick="closeCreateModal()" class="btn btn-secondary">
                        <i class="fa fa-times"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fa fa-edit"></i> Edit Menu Item</h2>
            </div>
            <form method="POST" action="/admin/cms/menu/update">
                <input type="hidden" id="edit_id" name="id">
                <div class="form-group">
                    <label for="edit_menu_title">Menu Title *</label>
                    <input type="text" id="edit_menu_title" name="menu_title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_menu_url">Menu URL *</label>
                    <input type="text" id="edit_menu_url" name="menu_url" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_menu_order">Order</label>
                    <input type="number" id="edit_menu_order" name="menu_order" class="form-control">
                </div>
                <div class="form-group">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" id="edit_is_active" name="is_active">
                        <label for="edit_is_active" style="margin: 0;">Active</label>
                    </div>
                </div>
                <div style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Update Menu Item
                    </button>
                    <button type="button" onclick="closeEditModal()" class="btn btn-secondary">
                        <i class="fa fa-times"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Delete Form -->
    <form id="deleteForm" method="POST" action="/admin/cms/menu/delete" style="display: none;">
        <input type="hidden" id="delete_id" name="id">
    </form>
    
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
        
        function openCreateModal() {
            document.getElementById('createModal').style.display = 'block';
        }
        
        function closeCreateModal() {
            document.getElementById('createModal').style.display = 'none';
        }
        
        function openEditModal(menu) {
            document.getElementById('edit_id').value = menu.id;
            document.getElementById('edit_menu_title').value = menu.menu_title;
            document.getElementById('edit_menu_url').value = menu.menu_url;
            document.getElementById('edit_menu_order').value = menu.menu_order;
            document.getElementById('edit_is_active').checked = menu.is_active == 1;
            document.getElementById('editModal').style.display = 'block';
        }
        
        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }
        
        function confirmDelete(id, title) {
            if (confirm('Are you sure you want to delete "' + title + '"?')) {
                document.getElementById('delete_id').value = id;
                document.getElementById('deleteForm').submit();
            }
        }
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            const createModal = document.getElementById('createModal');
            const editModal = document.getElementById('editModal');
            if (event.target == createModal) {
                closeCreateModal();
            }
            if (event.target == editModal) {
                closeEditModal();
            }
        }
    </script>
</body>
</html>
