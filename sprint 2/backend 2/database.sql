CREATE DATABASE user_management;
USE user_management;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE user_settings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT UNIQUE,
    language VARCHAR(10) DEFAULT 'ar',
    notifications BOOLEAN DEFAULT TRUE,
    privacy VARCHAR(20) DEFAULT 'public',
    location VARCHAR(100),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- إضافة مستخدم تجريبي
INSERT INTO users (full_name, username, password) VALUES 
('محمد علي', 'moh_al123', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'); -- password

INSERT INTO user_settings (user_id, language, notifications, privacy, location) VALUES 
(1, 'ar', TRUE, 'public', 'الرياض');