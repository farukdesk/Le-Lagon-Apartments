-- Sample Data for Le Lagon Apartments CMS
USE le_lagon_apartments;

-- Header Content
INSERT INTO header_content (logo_path, logo_alt, phone, email, is_active) VALUES
('assets/imgs/logo/logo.png', 'Le Lagon Apartments Logo', '+123 456 789', 'info@lelagon.com', TRUE);

-- Navigation Menu
INSERT INTO navigation_menu (menu_title, menu_url, parent_id, menu_order, is_active) VALUES
('Home', 'index.php', NULL, 1, TRUE),
('About Us', 'about.php', NULL, 2, TRUE),
('Rooms', 'rooms.php', NULL, 3, TRUE),
('Contact Us', 'contact.php', NULL, 4, TRUE);

-- Hero Slider
INSERT INTO hero_slider (title, subtitle, description, image_path, button_text, button_link, rating, slider_order, is_active) VALUES
('The Perfect Base For You', 'Unique Place to Relax & Enjoy', 'Experience luxury and comfort in the heart of the city', 'assets/imgs/slider/bg-8.jpg', 'Explore More', 'contact.php', 5, 1, TRUE),
('Enjoy The Best Moment Of Life', 'Unique Place to Relax & Enjoy', 'Create unforgettable memories in our luxury apartments', 'assets/imgs/slider/bg-9.jpg', 'Explore More', 'contact.php', 5, 2, TRUE),
('Enjoy a Luxury Experience', 'Unique Place to Relax & Enjoy', 'Indulge in world-class amenities and services', 'assets/imgs/slider/bg-10.jpg', 'Explore More', 'contact.php', 5, 3, TRUE);

-- Text Sections
INSERT INTO text_sections (section_name, section_key, content, is_active) VALUES
('Intro Text', 'intro_text', 'Discover the comfort and convenience of modern living at Sotel. Located in the heart of New York, our apartments offer the perfect blend of luxury and affordability. Whether you\'re a student, a professional, or a family, we have the perfect space to suit your lifestyle.', TRUE);

-- About Section
INSERT INTO about_section (section_title, subtitle, main_heading, description, image_path, button_text, button_link, phone, rating, is_active) VALUES
('Sotel Luxury Hotel', '', 'Enjoy a Luxury Experience', 'Located in Times Square, CozyStay apartment hotel provide a peaceful, private retreat in the heart of one of the world\'s most iconic cities. Experience a sophisticated blend of professional services and home comforts. We proudly offers a full range of complimentary amenities and services that provide you with everything you need for an inspiring stay.', 'assets/imgs/about/thumb2.png', 'Discover Now', 'contact.php', '+123 456 789', 5, TRUE);

-- Services
INSERT INTO services (service_name, price, price_unit, image_path, description, service_order, is_active) VALUES
('Room Breakfast', 30.00, 'Daily', 'assets/imgs/prices/s11.jpg', 'Start your day with a delicious breakfast', 1, TRUE),
('Room Cleaning', 50.00, 'Daily', 'assets/imgs/prices/s12.jpg', 'Professional cleaning services', 2, TRUE),
('Safe Locker', 70.00, 'Daily', 'assets/imgs/prices/s13.jpg', 'Secure storage for your valuables', 3, TRUE),
('Drinks Included', 40.00, 'Daily', 'assets/imgs/prices/s14.jpg', 'Complimentary drinks and refreshments', 4, TRUE);

-- Service Features
INSERT INTO service_features (service_id, feature_text, is_included, feature_order) VALUES
(1, 'Hotel ut nisan the duru', TRUE, 1),
(1, 'Orci miss natoque vasa ince', TRUE, 2),
(1, 'Clean sorem ipsum morbin', FALSE, 3),
(2, 'Hotel ut nisan the duru', TRUE, 1),
(2, 'Orci miss natoque vasa ince', TRUE, 2),
(2, 'Clean sorem ipsum morbin', FALSE, 3),
(3, 'Hotel ut nisan the duru', TRUE, 1),
(3, 'Orci miss natoque vasa ince', TRUE, 2),
(3, 'Clean sorem ipsum morbin', FALSE, 3),
(4, 'Hotel ut nisan the duru', TRUE, 1),
(4, 'Orci miss natoque vasa ince', TRUE, 2),
(4, 'Clean sorem ipsum morbin', FALSE, 3);

-- Rooms
INSERT INTO rooms (room_name, room_type, price, price_unit, size, max_guests, beds, bathrooms, description, image_path, room_order, is_active) VALUES
('Double Room', 'Standard', 219.00, 'NIGHT', '25 m2', 2, 2, 1, 'Comfortable double room with modern amenities', 'assets/imgs/room/img.jpg', 1, TRUE),
('Deluxe Room', 'Deluxe', 299.00, 'NIGHT', '35 m2', 2, 2, 1, 'Spacious deluxe room with premium features', 'assets/imgs/room/img2.jpg', 2, TRUE),
('Family Suite', 'Suite', 399.00, 'NIGHT', '50 m2', 4, 3, 2, 'Large family suite perfect for groups', 'assets/imgs/room/img3.jpg', 3, TRUE);

-- Footer Content
INSERT INTO footer_content (footer_section, section_title, content, section_order, is_active) VALUES
('about', 'About Us', 'Hotel booking is the process of reserving an securing accommodations in hotels', 1, TRUE),
('experiences', 'Experinces', '', 2, TRUE),
('quick_links', 'Quick links', '', 3, TRUE),
('contact', 'Contact', '', 4, TRUE);

-- Social Links
INSERT INTO social_links (platform_name, platform_url, icon_class, link_order, is_active) VALUES
('Facebook', 'https://www.facebook.com/', 'fab fa-facebook-f', 1, TRUE),
('Instagram', 'https://instagram.com/', 'fa-brands fa-instagram', 2, TRUE),
('Pinterest', 'https://www.pinterest.com/', 'fa-brands fa-pinterest-p', 3, TRUE),
('Vimeo', 'https://vimeo.com/', 'fa-brands fa-vimeo-v', 4, TRUE);
