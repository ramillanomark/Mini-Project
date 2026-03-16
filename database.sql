CREATE DATABASE IF NOT EXISTS portfolio_db;
USE portfolio_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    tech_used VARCHAR(255),
    date_added DATE
);

CREATE TABLE skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    skill_name VARCHAR(100),
    skill_level VARCHAR(50)
);

CREATE TABLE experiences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(100),
    company VARCHAR(100),
    description TEXT,
    year VARCHAR(20)
);

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT,
    date_sent DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- default admin: admin / admin123
INSERT INTO users (username, password) VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

INSERT INTO projects (title, description, tech_used, date_added) VALUES
('My Portfolio', 'This portfolio website.', 'PHP, MySQL, HTML, CSS', '2024-01-01'),
('Simple Todo App', 'A basic todo list with CRUD.', 'PHP, MySQL', '2024-02-01');

INSERT INTO skills (skill_name, skill_level) VALUES
('PHP', 'Intermediate'),
('MySQL', 'Intermediate'),
('HTML/CSS', 'Advanced');

INSERT INTO experiences (job_title, company, description, year) VALUES
('OJT Intern', 'Local IT Company', 'Helped maintain their website and database.', '2024');
