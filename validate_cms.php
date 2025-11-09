#!/usr/bin/env php
<?php
/**
 * CMS Functionality Validation Script
 * Tests basic functionality of the CMS implementation
 */

echo "=== CMS Implementation Validation ===\n\n";

$errors = [];
$warnings = [];
$passed = 0;

// Test 1: Check if required files exist
echo "Test 1: Checking required files...\n";
$requiredFiles = [
    'app/controllers/AdminController.php',
    'app/core/Router.php',
    'app/views/admin/cms.php',
    'app/views/admin/cms-logo.php',
    'app/views/admin/cms-menu.php',
    'app/views/admin/cms-hero.php',
    'app/views/admin/dashboard.php',
    'CMS_FEATURES.md',
];

foreach ($requiredFiles as $file) {
    if (file_exists($file)) {
        echo "  ✓ $file exists\n";
        $passed++;
    } else {
        echo "  ✗ $file NOT FOUND\n";
        $errors[] = "Missing file: $file";
    }
}

// Test 2: Check upload directories
echo "\nTest 2: Checking upload directories...\n";
$uploadDirs = [
    'uploads',
    'uploads/logo',
    'uploads/favicon',
    'uploads/hero',
];

foreach ($uploadDirs as $dir) {
    if (is_dir($dir)) {
        $perms = substr(sprintf('%o', fileperms($dir)), -4);
        echo "  ✓ $dir exists (permissions: $perms)\n";
        $passed++;
        
        if (!is_writable($dir)) {
            $warnings[] = "Directory $dir is not writable";
            echo "    ⚠ Warning: Directory is not writable\n";
        }
    } else {
        echo "  ✗ $dir NOT FOUND\n";
        $errors[] = "Missing directory: $dir";
    }
}

// Test 3: PHP Syntax check
echo "\nTest 3: Checking PHP syntax...\n";
$phpFiles = [
    'app/controllers/AdminController.php',
    'app/core/Router.php',
];

foreach ($phpFiles as $file) {
    $output = [];
    $returnVar = 0;
    exec("php -l $file 2>&1", $output, $returnVar);
    
    if ($returnVar === 0) {
        echo "  ✓ $file - No syntax errors\n";
        $passed++;
    } else {
        echo "  ✗ $file - Syntax errors found\n";
        $errors[] = "Syntax error in $file";
    }
}

// Test 4: Check Router instantiation
echo "\nTest 4: Testing Router instantiation...\n";
try {
    require_once 'app/core/Router.php';
    $router = new Router();
    echo "  ✓ Router instantiated successfully\n";
    $passed++;
} catch (Exception $e) {
    echo "  ✗ Router instantiation failed: " . $e->getMessage() . "\n";
    $errors[] = "Router instantiation failed";
}

// Test 5: Check AdminController methods
echo "\nTest 5: Checking AdminController CMS methods...\n";
$adminControllerContent = file_get_contents('app/controllers/AdminController.php');
$cmsMethods = [
    'cms',
    'cmsLogo',
    'cmsLogoUpdate',
    'cmsMenu',
    'cmsMenuCreate',
    'cmsMenuUpdate',
    'cmsMenuDelete',
    'cmsHero',
    'cmsHeroCreate',
    'cmsHeroUpdate',
    'cmsHeroDelete',
    'handleFileUpload',
];

foreach ($cmsMethods as $method) {
    if (strpos($adminControllerContent, "function $method(") !== false) {
        echo "  ✓ Method $method() exists\n";
        $passed++;
    } else {
        echo "  ✗ Method $method() NOT FOUND\n";
        $errors[] = "Missing method: $method";
    }
}

// Test 6: Check Routes
echo "\nTest 6: Checking CMS routes in Router...\n";
$routerContent = file_get_contents('app/core/Router.php');
$cmsRoutes = [
    '/admin/cms',
    '/admin/cms/logo',
    '/admin/cms/menu',
    '/admin/cms/hero',
];

foreach ($cmsRoutes as $route) {
    if (strpos($routerContent, "'$route'") !== false) {
        echo "  ✓ Route $route registered\n";
        $passed++;
    } else {
        echo "  ✗ Route $route NOT FOUND\n";
        $errors[] = "Missing route: $route";
    }
}

// Test 7: Check responsive design elements
echo "\nTest 7: Checking responsive design implementation...\n";
$dashboardContent = file_get_contents('app/views/admin/dashboard.php');
$responsiveElements = [
    'menu-toggle' => 'Mobile menu toggle button',
    'toggleMenu()' => 'Toggle menu function',
    '@media (max-width: 768px)' => 'Mobile responsive CSS',
];

foreach ($responsiveElements as $element => $description) {
    if (strpos($dashboardContent, $element) !== false) {
        echo "  ✓ $description found\n";
        $passed++;
    } else {
        echo "  ✗ $description NOT FOUND\n";
        $errors[] = "Missing responsive element: $description";
    }
}

// Summary
echo "\n" . str_repeat("=", 50) . "\n";
echo "VALIDATION SUMMARY\n";
echo str_repeat("=", 50) . "\n";
echo "Tests Passed: $passed\n";
echo "Errors: " . count($errors) . "\n";
echo "Warnings: " . count($warnings) . "\n";

if (count($errors) > 0) {
    echo "\nERRORS:\n";
    foreach ($errors as $error) {
        echo "  ✗ $error\n";
    }
}

if (count($warnings) > 0) {
    echo "\nWARNINGS:\n";
    foreach ($warnings as $warning) {
        echo "  ⚠ $warning\n";
    }
}

if (count($errors) === 0) {
    echo "\n✓ ALL TESTS PASSED! CMS implementation is valid.\n";
    exit(0);
} else {
    echo "\n✗ VALIDATION FAILED. Please fix the errors above.\n";
    exit(1);
}
