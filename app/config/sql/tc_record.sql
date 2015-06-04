CREATE DATABASE IF NOT EXISTS tcrecord;
GRANT SELECT, INSERT, UPDATE, DELETE ON tcrecord.* TO tcrecord_root@localhost IDENTIFIED BY 'tcrecord_root';
FLUSH PRIVILEGES;

Use tcrecord;
CREATE TABLE IF NOT EXISTS thread(
id                  INT(11) NOT NULL AUTO_INCREMENT,
user_id             INT(11) NOT NULL,
title               VARCHAR(50) NOT NULL,
category            VARCHAR(30) NOT NULL,
created             TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id)
)ENGINE=InnoDB;

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
);  

