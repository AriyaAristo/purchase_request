CREATE DATABASE purchase_request;

USE purchase_request;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('officer', 'manager', 'finance') NOT NULL
);

CREATE TABLE purchase_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    item_name VARCHAR(255),
    quantity INT,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending', 
    manager_comment TEXT,
    finance_comment TEXT,
    proof_of_payment VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);