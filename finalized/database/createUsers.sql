

CREATE TABLE users
(
  userId  int(11) not null  auto_increment,
  userName varchar(60) not null,
  password varchar(20) not null,
PRIMARY KEY (userId)
);
