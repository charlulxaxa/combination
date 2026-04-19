
CREATE DATABASE IF NOT EXISTS EduRIft_db;


USE EduRIft_db;


SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE IF NOT EXISTS Account(
	account_id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS User(
	user_id INT AUTO_INCREMENT,
    account_id INT NOT NULL,
	first_name varchar(255) NOT NULL,
    last_name varchar(255) NOT NULL,
    status varchar(20) NOT NULL DEFAULT "Active",
    PRIMARY KEY(user_id),
    FOREIGN KEY(account_id) REFERENCES Account(account_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Class_User(
    class_user_id INT AUTO_INCREMENT,
    class_id INT NOT NULL,
    account_id INT NOT NULL,
    role VARCHAR(20) NOT NULL,
    PRIMARY KEY(class_user_id),
    join_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (class_id) REFERENCES Class(class_id),
    FOREIGN KEY(account_id) REFERENCES Account(account_id)
);

CREATE TABLE IF NOT EXISTS Class(
    class_id INT AUTO_INCREMENT,
    class_desc VARCHAR(255),
    class_code VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(class_id),
    created_by VARCHAR(255) NOT NULL,
    status varchar(20) NOT NULL DEFAULT "Active"
);

CREATE TABLE IF NOT EXISTS Submission(
	submission_id INT AUTO_INCREMENT NOT NULL,
    class_user_id INT NOT NULL,
    activity_id INT NOT NULL,
    grade INT NOT NULL,
    PRIMARY KEY(submission_id),
    FOREIGN KEY (class_user_id) REFERENCES Class_User(class_user_id),
    FOREIGN KEY (activity_id) REFERENCES Activity(activity_id)
);

CREATE TABLE IF NOT EXISTS Activity(
    activity_id INT AUTO_INCREMENT NOT NULL,
    class_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    due_date DATE NOT NULL,
    PRIMARY KEY(activity_id),
    FOREIGN KEY (class_id) REFERENCES Class(class_id),
    status varchar(20) NOT NULL DEFAULT "Incomplete"
);

CREATE TABLE IF NOT EXISTS Material(
	material_id INT AUTO_INCREMENT NOT NULL,
    class_id INT NOT NULL,
    description VARCHAR(255),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(material_id),
	FOREIGN KEY (class_id) REFERENCES Class(class_id)
);



SET FOREIGN_KEY_CHECKS = 1;    