# Email Collector Project

This project is a simple web application built using **PHP**, **MySQL**, and **Docker** to collect and store user emails in a MySQL database. It includes an email submission form, a database to store the emails, and a basic front-end interface.

## Features

- **Email Form:** A simple form where users can submit their email.
- **Database Storage:** Emails are stored in a MySQL database.
- **Dockerized:** The app runs inside Docker containers for easy deployment and setup.

## Tech Stack

- **PHP:** Backend scripting language to handle form submissions.
- **MySQL:** Database to store the emails.
- **Docker:** Containerization for easy deployment.
- **Apache:** Web server for running the PHP app.
- **phpMyAdmin:** Web-based interface for managing the MySQL database.

## Getting Started

To get this project running locally, follow these steps:

### Prerequisites

- **Docker** must be installed on your machine. You can download it from [here](https://www.docker.com/products/docker-desktop).
- **Git** to clone the repository.

### 1. Clone the Repository

Clone this repository to your local machine:

git clone https://github.com/ntui04/email-collector.git
cd email-collector
2. Set Up Docker Containers

Build and start the Docker containers using docker-compose:

docker-compose up --build -d

This will build the necessary containers for:

    The PHP and Apache server (www)

    The MySQL database (db)

    phpMyAdmin for easy database management (phpmyadmin)

3. Access the App

    Open your browser and go to http://localhost to access the email collection form.

    The form will accept user emails and store them in the database.

4. Access phpMyAdmin

To manage the MySQL database:

    Go to http://localhost:80 to access phpMyAdmin.

    Use the following credentials:

        Username: root

        Password: root

        Database: email_collector
5. Database Schema

##The emails table schema:

    CREATE TABLE emails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);



## Go to http://localhost:80 to access phpMyAdmin.



