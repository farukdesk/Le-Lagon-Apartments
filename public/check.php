<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Lagon Apartments - System Check</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            padding: 40px;
            max-width: 800px;
            width: 100%;
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
            text-align: center;
        }
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }
        .check-item {
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .check-item.success {
            background: #d4edda;
            border-left: 4px solid #28a745;
        }
        .check-item.error {
            background: #f8d7da;
            border-left: 4px solid #dc3545;
        }
        .check-item.warning {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
        }
        .status {
            font-weight: bold;
            padding: 5px 15px;
            border-radius: 20px;
        }
        .status.ok {
            background: #28a745;
            color: white;
        }
        .status.fail {
            background: #dc3545;
            color: white;
        }
        .status.warning {
            background: #ffc107;
            color: #333;
        }
        .section {
            margin: 30px 0;
        }
        .section h2 {
            color: #667eea;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }
        .info-box {
            background: #e7f3ff;
            border-left: 4px solid #2196F3;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .info-box ul {
            margin: 10px 0 0 20px;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            margin: 10px 5px;
            transition: transform 0.3s;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        .actions {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🏨 Le Lagon Apartments CMS</h1>
        <p class="subtitle">System Requirements Check</p>

        <?php
        // PHP Version Check
        $phpVersion = PHP_VERSION;
        $phpOk = version_compare($phpVersion, '7.4.0', '>=');
        ?>

        <div class="section">
            <h2>PHP Configuration</h2>
            
            <div class="check-item <?php echo $phpOk ? 'success' : 'error'; ?>">
                <div>
                    <strong>PHP Version:</strong> <?php echo $phpVersion; ?>
                    <br><small>Required: 7.4.0 or higher</small>
                </div>
                <span class="status <?php echo $phpOk ? 'ok' : 'fail'; ?>">
                    <?php echo $phpOk ? 'OK' : 'FAIL'; ?>
                </span>
            </div>

            <?php
            // Check for required extensions
            $extensions = [
                'pdo' => extension_loaded('pdo'),
                'pdo_mysql' => extension_loaded('pdo_mysql'),
                'mysqli' => extension_loaded('mysqli'),
                'json' => extension_loaded('json'),
                'mbstring' => extension_loaded('mbstring'),
                'openssl' => extension_loaded('openssl')
            ];
            ?>

            <?php foreach ($extensions as $ext => $loaded): ?>
            <div class="check-item <?php echo $loaded ? 'success' : 'error'; ?>">
                <div>
                    <strong>Extension:</strong> <?php echo strtoupper($ext); ?>
                </div>
                <span class="status <?php echo $loaded ? 'ok' : 'fail'; ?>">
                    <?php echo $loaded ? 'Loaded' : 'Missing'; ?>
                </span>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="section">
            <h2>File System Permissions</h2>
            
            <?php
            $paths = [
                'config/database.php' => file_exists('../config/database.php'),
                'public/index.php' => file_exists('index.php'),
                'public/.htaccess' => file_exists('.htaccess'),
                'logs/' => is_dir('../logs'),
                'app/' => is_dir('../app'),
            ];
            ?>

            <?php foreach ($paths as $path => $exists): ?>
            <div class="check-item <?php echo $exists ? 'success' : 'error'; ?>">
                <div>
                    <strong>Path:</strong> <?php echo $path; ?>
                </div>
                <span class="status <?php echo $exists ? 'ok' : 'fail'; ?>">
                    <?php echo $exists ? 'Found' : 'Missing'; ?>
                </span>
            </div>
            <?php endforeach; ?>

            <?php
            // Check if logs directory is writable
            $logsWritable = is_writable('../logs');
            ?>
            
            <div class="check-item <?php echo $logsWritable ? 'success' : 'warning'; ?>">
                <div>
                    <strong>Logs Directory:</strong> Writable status
                </div>
                <span class="status <?php echo $logsWritable ? 'ok' : 'warning'; ?>">
                    <?php echo $logsWritable ? 'Writable' : 'Not Writable'; ?>
                </span>
            </div>
        </div>

        <div class="section">
            <h2>Database Connection</h2>
            
            <?php
            $dbConfigured = false;
            $dbConnected = false;
            $dbMessage = '';

            if (file_exists('../config/database.php')) {
                require_once '../config/database.php';
                $dbConfigured = (DB_NAME !== 'le_lagon_apartments' || DB_USER !== 'root');
                
                try {
                    $testDb = Database::getInstance()->getConnection();
                    $dbConnected = true;
                    $dbMessage = 'Successfully connected to database';
                } catch (Exception $e) {
                    $dbMessage = $e->getMessage();
                }
            } else {
                $dbMessage = 'Database configuration file not found';
            }
            ?>

            <div class="check-item <?php echo $dbConnected ? 'success' : ($dbConfigured ? 'error' : 'warning'); ?>">
                <div>
                    <strong>Database Connection:</strong><br>
                    <small><?php echo htmlspecialchars($dbMessage); ?></small>
                </div>
                <span class="status <?php echo $dbConnected ? 'ok' : 'fail'; ?>">
                    <?php echo $dbConnected ? 'Connected' : 'Failed'; ?>
                </span>
            </div>

            <?php if (!$dbConfigured): ?>
            <div class="info-box">
                <strong>⚠️ Database Not Configured</strong>
                <p>Please follow these steps:</p>
                <ol>
                    <li>Create a MySQL database</li>
                    <li>Import <code>database/schema.sql</code></li>
                    <li>Import <code>database/sample_data.sql</code> (optional)</li>
                    <li>Update <code>config/database.php</code> with your credentials</li>
                </ol>
            </div>
            <?php endif; ?>
        </div>

        <div class="section">
            <h2>Apache Configuration</h2>
            
            <?php
            $modRewrite = function_exists('apache_get_modules') ? 
                in_array('mod_rewrite', apache_get_modules()) : 
                'unknown';
            ?>

            <div class="check-item <?php echo $modRewrite === true ? 'success' : 'warning'; ?>">
                <div>
                    <strong>mod_rewrite:</strong> URL rewriting
                    <br><small>Required for clean URLs</small>
                </div>
                <span class="status <?php echo $modRewrite === true ? 'ok' : 'warning'; ?>">
                    <?php 
                    if ($modRewrite === true) echo 'Enabled';
                    elseif ($modRewrite === false) echo 'Disabled';
                    else echo 'Unknown';
                    ?>
                </span>
            </div>
        </div>

        <?php
        $allChecks = $phpOk && 
                     $extensions['pdo'] && 
                     $extensions['pdo_mysql'] && 
                     file_exists('index.php') && 
                     file_exists('.htaccess');
        ?>

        <?php if ($allChecks && $dbConnected): ?>
        <div class="info-box" style="background: #d4edda; border-color: #28a745;">
            <strong>✅ System Ready!</strong>
            <p>All requirements are met. Your CMS is ready to use.</p>
        </div>
        <?php else: ?>
        <div class="info-box" style="background: #fff3cd; border-color: #ffc107;">
            <strong>⚠️ Action Required</strong>
            <p>Please resolve the issues above before using the CMS.</p>
        </div>
        <?php endif; ?>

        <div class="actions">
            <?php if ($allChecks && $dbConnected): ?>
                <a href="/" class="btn">View Website</a>
                <a href="/admin" class="btn">Admin Panel</a>
            <?php else: ?>
                <a href="../INSTALL.md" class="btn">Installation Guide</a>
                <a href="check.php" class="btn">Recheck</a>
            <?php endif; ?>
        </div>

        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; text-align: center; color: #666; font-size: 12px;">
            <p>Le Lagon Apartments CMS v1.0 | PHP MVC Architecture</p>
            <p style="margin-top: 5px;">For support, refer to README.md and INSTALL.md</p>
        </div>
    </div>
</body>
</html>
