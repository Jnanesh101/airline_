CREATE TABLE USERS (
    user_id INT AUTO_INCREMENT,
    name VARCHAR(30),
    email VARCHAR(30) UNIQUE,
    password VARCHAR(30),
    PRIMARY KEY (user_id)
);
GRANT ALL ON AUTOS.* TO 'bhargavram'@'localhost' IDENTIFIED BY 'autos';
GRANT ALL ON AUTOS.* TO 'bhargavram'@'127.0.0.1' IDENTIFIED BY 'autos';