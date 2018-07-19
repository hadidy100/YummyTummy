CREATE DATABASE YUMMYTUMMY;
SHOW DATABASES;
USE YUMMYTUMMY; # CONNECTING TO THE NEWLY CREATED DATABASE

SHOW TABLES; # TO SHOW ALL THE TABLES IN THE DATABASE
CREATE TABLE images
(
  imageId int not null AUTO_INCREMENT PRIMARY KEY,
  image blob not null,
  imageLabel varchar(30) not null
);

create table imageDescription
  (
    descId int not null AUTO_INCREMENT PRIMARY KEY,
    imageId int not null,
    description varchar (120),
	  CONSTRAINT 	FOREIGN KEY (imageId) REFERENCES images (imageId)
		ON DELETE CASCADE
		ON UPDATE RESTRICT
  );

show tables;
#https://github.com/hadidy100/YummyTummy.git
