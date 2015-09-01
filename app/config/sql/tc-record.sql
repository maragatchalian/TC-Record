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
new_employee_id     INT(11) NOT NULL,
first_name          VARCHAR(50) NOT NULL,
last_name           VARCHAR(50) NOT NULL,
nickname            VARCHAR(50) NOT NULL,
skill_set           TINYINT(1) NOT NULL,
course_status       VARCHAR(50) NOT NULL,
training_status     VARCHAR(20) NOT NULL,
batch_term          VARCHAR(30) NOT NULL,
batch_year          INT(4) NOT NULL,
date_hired          DATE NOT NULL,
date_graduated      DATE NOT NULL,
PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS course(
id                  INT(11) NOT NULL AUTO_INCREMENT,
name                VARCHAR(50) NOT NULL,
category            VARCHAR(30) NOT NULL,
PRIMARY KEY (id)
)ENGINE=InnoDB;

--
-- Dumping data for table `course`
--

INSERT INTO `course` 
(`id`, `name`, `category`) VALUES
('1', 'Computer Science', 'Essential Course'),
('2', 'Database', 'Essential Course'),
('3', 'DSA', 'Essential Course'),
('4', 'Networking', 'Essential Course'),
('5', 'Linux', 'Language Course'),
('6', 'PHP', 'Language Course'),
('7', 'DietCake', 'Language Course'),
('8', 'Objective C', 'Language Course'),
('9', 'iOS', 'Language Course'),
('10', 'Java', 'Language Course'),
('11', 'Android', 'Language Course'),
('12', 'C sharp', 'Language Course'),
('13', 'Unity', 'Language Course'),
('14', 'Finals Project', 'Project Course'),
('15', 'Group Project', 'Project Course'),
('16', 'Personal Project', 'Project Course');

CREATE TABLE IF NOT EXISTS exam(
id                  INT(11) NOT NULL AUTO_INCREMENT,
trainee_id          INT(11) NOT NULL,
course_name         VARCHAR(30) NOT NULL,
course_type         VARCHAR(20) NOT NULL,
exam_type           VARCHAR(20) NOT NULL,
items               INT(3) NOT NULL,
score               INT(3) NOT NULL,
status              TINYINT(1) NOT NULL,
date_taken          DATE NOT NULL, 
PRIMARY KEY (id)
)ENGINE=InnoDB;