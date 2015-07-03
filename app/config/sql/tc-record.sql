CREATE DATABASE IF NOT EXISTS tcrecord;
GRANT SELECT, INSERT, UPDATE, DELETE ON tcrecord.* TO tcrecord_root@localhost IDENTIFIED BY 'tcrecord_root';
FLUSH PRIVILEGES;

Use tcrecord;
CREATE TABLE IF NOT EXISTS user(
id                  INT(11) NOT NULL AUTO_INCREMENT,
username            VARCHAR(20) NOT NULL,
first_name          VARCHAR(50) NOT NULL,
last_name           VARCHAR(50) NOT NULL,
password            VARCHAR(50) NOT NULL,
email               VARCHAR(50) UNIQUE NOT NULL,
user_type           VARCHAR(20) NOT NULL,
registered          TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS trainee(
id                  INT(11) NOT NULL AUTO_INCREMENT,
employee_id         INT(11) NOT NULL,
first_name          VARCHAR(50) NOT NULL,
last_name           VARCHAR(50) NOT NULL,
skill_set           VARCHAR(20) NOT NULL,
course_status       VARCHAR(50) NOT NULL,
training_status     VARCHAR(20) NOT NULL,
batch               VARCHAR(30) NOT NULL,
hired               VARCHAR(30) NOT NULL,
graduated           VARCHAR(30) NOT NULL,
PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS course(
id                  INT(11) NOT NULL AUTO_INCREMENT,
name                VARCHAR(50) NOT NULL,
category            VARCHAR(30) NOT NULL,
PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS exam(
id                  INT(11) NOT NULL AUTO_INCREMENT,
trainee_id          INT(11) NOT NULL,
course_id           INT(11) NOT NULL,
score               INT(3) NOT NULL,
makeup_score        INT(3) NOT NULL,
date_taken          VARCHAR(30) NOT NULL,
PRIMARY KEY (id)
)ENGINE=InnoDB;