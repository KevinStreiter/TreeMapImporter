CREATE SCHEMA IF NOT EXISTS treeMap;
USE treeMap;

CREATE USER IF NOT EXISTS gegege
    IDENTIFIED BY 'MWXw9$Ppmjl51drrm7';

GRANT ALL
    ON treeMap.*
    TO gegege;
FLUSH PRIVILEGES;

CREATE TABLE Projects (
 project_id INT NOT NULL AUTO_INCREMENT,
 name VARCHAR(255) NOT NULL,
 width FLOAT NOT NULL,
 height FLOAT NOT NULL,
 PRIMARY KEY (project_id)
)ENGINE=INNODB;

CREATE TABLE Files (
    project_id INT NOT NULL,
    element JSON NOT NULL,
    FOREIGN KEY (project_id)
        REFERENCES Projects(project_id)
        ON DELETE CASCADE
)ENGINE=INNODB;

CREATE TABLE Users (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY username (username)
) ENGINE=InnoDB;