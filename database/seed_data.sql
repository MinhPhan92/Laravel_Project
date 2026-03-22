-- ============================================
-- Chèn dữ liệu mẫu (chạy trong phpMyAdmin → SQL)
-- Database: qlbh_67pm34
-- Chạy sau khi đã migrate xong.
-- ============================================

-- User (đăng nhập: admin@example.com / mật khẩu: password)
INSERT INTO `users` (`name`, `email`, `password`, `is_active`, `created_at`, `updated_at`) VALUES
('Admin', 'admin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, NOW(), NOW());

-- Categories
INSERT INTO `categories` (`name`, `created_at`, `updated_at`) VALUES
('Laptop', NOW(), NOW()),
('Điện thoại', NOW(), NOW()),
('Phụ kiện', NOW(), NOW());

-- Products (category_id 1=Laptop, 2=Điện thoại, 3=Phụ kiện)
INSERT INTO `products` (`category_id`, `name`, `price`, `sale_price`, `stock`, `description`, `image`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Laptop Dell XPS', 25000000.00, NULL, 10, NULL, NULL, 1, 0, NOW(), NOW()),
(2, 'iPhone 15', 28000000.00, 26000000.00, 20, NULL, NULL, 1, 0, NOW(), NOW()),
(3, 'Tai nghe Bluetooth', 500000.00, NULL, 50, 'Tai nghe chụp tai', NULL, 1, 0, NOW(), NOW());
