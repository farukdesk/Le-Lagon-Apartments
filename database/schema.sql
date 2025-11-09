-- Le Lagon Apartments Database Schema
-- This schema supports a fully customizable CMS for the hotel booking platform

CREATE DATABASE IF NOT EXISTS le_lagon_apartments CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE le_lagon_apartments;

-- Site Settings Table
CREATE TABLE IF NOT EXISTS site_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) UNIQUE NOT NULL,
    setting_value TEXT,
    setting_type VARCHAR(50) DEFAULT 'text',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Header Section Content
CREATE TABLE IF NOT EXISTS header_content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    logo_path VARCHAR(255),
    logo_alt VARCHAR(255),
    phone VARCHAR(50),
    email VARCHAR(100),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Navigation Menu
CREATE TABLE IF NOT EXISTS navigation_menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    menu_title VARCHAR(100) NOT NULL,
    menu_url VARCHAR(255) NOT NULL,
    parent_id INT DEFAULT NULL,
    menu_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (parent_id) REFERENCES navigation_menu(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Hero Slider Section
CREATE TABLE IF NOT EXISTS hero_slider (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    subtitle VARCHAR(255),
    description TEXT,
    image_path VARCHAR(255) NOT NULL,
    button_text VARCHAR(100),
    button_link VARCHAR(255),
    rating INT DEFAULT 5,
    slider_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Text Section (for intro/description sections)
CREATE TABLE IF NOT EXISTS text_sections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(100) NOT NULL,
    section_key VARCHAR(100) UNIQUE NOT NULL,
    content TEXT,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- About Section
CREATE TABLE IF NOT EXISTS about_section (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section_title VARCHAR(255),
    subtitle VARCHAR(255),
    main_heading VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image_path VARCHAR(255),
    button_text VARCHAR(100),
    button_link VARCHAR(255),
    phone VARCHAR(50),
    rating INT DEFAULT 5,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Services/Prices Section
CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    price_unit VARCHAR(50) DEFAULT 'Daily',
    image_path VARCHAR(255),
    description TEXT,
    service_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Service Features (for checkmarks/features in services)
CREATE TABLE IF NOT EXISTS service_features (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_id INT NOT NULL,
    feature_text VARCHAR(255) NOT NULL,
    is_included BOOLEAN DEFAULT TRUE,
    feature_order INT DEFAULT 0,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Rooms/Apartments
CREATE TABLE IF NOT EXISTS rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_name VARCHAR(255) NOT NULL,
    room_type VARCHAR(100),
    price DECIMAL(10, 2) NOT NULL,
    price_unit VARCHAR(50) DEFAULT 'NIGHT',
    size VARCHAR(50),
    max_guests INT,
    beds INT,
    bathrooms INT,
    description TEXT,
    image_path VARCHAR(255),
    room_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Room Amenities
CREATE TABLE IF NOT EXISTS room_amenities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT NOT NULL,
    amenity_name VARCHAR(100) NOT NULL,
    amenity_icon VARCHAR(255),
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Testimonials
CREATE TABLE IF NOT EXISTS testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(255) NOT NULL,
    client_position VARCHAR(255),
    client_company VARCHAR(255),
    testimonial_text TEXT NOT NULL,
    client_image VARCHAR(255),
    rating INT DEFAULT 5,
    testimonial_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Footer Content
CREATE TABLE IF NOT EXISTS footer_content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    footer_section VARCHAR(100) NOT NULL,
    section_title VARCHAR(255),
    content TEXT,
    section_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Social Media Links
CREATE TABLE IF NOT EXISTS social_links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    platform_name VARCHAR(50) NOT NULL,
    platform_url VARCHAR(255) NOT NULL,
    icon_class VARCHAR(100),
    link_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Bookings (for booking functionality)
CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT,
    customer_name VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    customer_phone VARCHAR(50),
    check_in_date DATE NOT NULL,
    check_out_date DATE NOT NULL,
    adults INT DEFAULT 1,
    children INT DEFAULT 0,
    special_requests TEXT,
    total_price DECIMAL(10, 2),
    booking_status VARCHAR(50) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Admin Users
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(255),
    role VARCHAR(50) DEFAULT 'admin',
    is_active BOOLEAN DEFAULT TRUE,
    last_login TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default admin user (password: admin123)
INSERT INTO admin_users (username, email, password, full_name, role) VALUES
('admin', 'admin@lelagon.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin');

-- Insert default site settings
INSERT INTO site_settings (setting_key, setting_value, setting_type) VALUES
('site_name', 'Le Lagon Apartments', 'text'),
('site_title', 'Le Lagon - Luxury Apartments & Hotel Booking', 'text'),
('site_description', 'Experience luxury and comfort at Le Lagon Apartments', 'textarea'),
('site_email', 'info@lelagon.com', 'email'),
('site_phone', '+123 456 789', 'text'),
('site_address', '3891 Ranchview Dr. Richardson', 'textarea');
