CREATE TABLE applications (
    application_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(64),
    last_name VARCHAR(64),
    age INT,
    birthdate DATE,
    gender VARCHAR(64),
    religion VARCHAR(64),
    email_address VARCHAR(256),
    home_address VARCHAR(512),
    experienceInMonths INT,
    date_applied TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)