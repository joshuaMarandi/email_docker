# Email Collector Project

This project is a simple web application that collects email addresses from users and stores them in a MySQL database. It uses Docker to containerize the application, making it easy to set up and run.

---

## Features
- Collects email addresses through a web form.
- Validates email addresses before saving them to the database.
- Prevents duplicate email entries using `INSERT IGNORE`.
- Includes a `phpMyAdmin` interface for managing the database.

---

## Technologies Used
- **PHP**: Backend logic for handling form submissions and database interactions.
- **MySQL**: Database for storing email addresses.
- **phpMyAdmin**: Web-based interface for managing the database.
- **Docker**: Containerization for easy setup and deployment.

---

## Creating table to database
docker-compose exec db mysql -u user -p -e "
  USE email_collector;
  CREATE TABLE IF NOT EXISTS emails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );
"