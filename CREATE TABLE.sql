CREATE TABLE user(
	username varchar(50) NOT NULL, 
	password varchar(50) NOT NULL, 
	PRIMARY KEY (username));

CREATE TABLE staff(
	username varchar(50) NOT NULL, 
	PRIMARY KEY (username), 
	FOREIGN KEY (username) REFERENCES user (username));

CREATE TABLE StudentFaculty(
	username varchar(50) NOT NULL, 
	name varchar(50) NULL, 
	DOB datetime NULL, 
	gender char(1) NULL, 
	isDebarred char(1) NULL, 
	Email varchar(50) NULL, 
	Address varchar(50) NULL, 
	IsFaculty char(1) NULL, 
	Dept varchar(50) NULL, Penalty long NULL, PRIMARY KEY (Username), FOREIGN KEY (Username) REFERENCES 'User' (Username));