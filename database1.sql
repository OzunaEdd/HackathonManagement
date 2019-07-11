/*---------------------------------------------
Delete any existing database called csc350.
Create a new database called csc350.
Use the database created.
-----------------------------------------------*/

DROP DATABASE IF EXISTS csc350;
CREATE DATABASE csc350;
USE csc350;

/*---------------------------------------------
Create a new table called admin
This will be used to store the admin's info.
-----------------------------------------------*/

CREATE TABLE admin (
    admin_id int NOT NULL AUTO_INCREMENT,
    budget varchar(32),
    username varchar(32) NOT NULL,
    passw varchar(32) NOT NULL,
    admin_name varchar(32) NOT NULL,
    phone varchar(32),
    email varchar(32) NOT NULL,
    PRIMARY KEY (admin_id)
);

/*---------------------------------------------
Create a new table called participants
This will be used to store the participant's info.
-----------------------------------------------*/
CREATE TABLE teams (
    team_id int NOT NULL AUTO_INCREMENT,
    team_name varchar(32) NOT NULL,
    PRIMARY KEY (team_id)
);
CREATE TABLE participants (
    participant_id int NOT NULL AUTO_INCREMENT,
    participant_name varchar(32) NOT NULL,
    email varchar(32) NOT NULL,
    phone numeric(10,0),
    major varchar(32),
    tshirt_size char(1),
    food_preference varchar(32),
    team_id int NOT NULL,
    PRIMARY KEY (participant_id),
    FOREIGN KEY (team_id) REFERENCES teams(team_id)
);

/*---------------------------------------------
Create a new table called teams
This will be used to store the team's info.
-----------------------------------------------*/

/*---------------------------------------------
Create a new table called judges
This will be used to store the judge's info.
-----------------------------------------------*/

CREATE TABLE judges (
    judge_id int NOT NULL AUTO_INCREMENT,
    judge_name varchar(32) NOT NULL,
    judge_last_name varchar(32) NOT NULL,
    occupation varchar(32),
    admin_id int,
    team_id int,
    PRIMARY KEY (judge_id),
    FOREIGN KEY (admin_id) REFERENCES admin(admin_id),
    FOREIGN KEY (team_id) REFERENCES teams(team_id)
);

/*---------------------------------------------
Create a new table called sponsors
This will be used to store the sponsor's info.
-----------------------------------------------*/

CREATE TABLE sponsors (
    sponsor_id int NOT NULL AUTO_INCREMENT,
    sponsor_name varchar(32) NOT NULL,
    contribution varchar(32),
    admin_id int,
    sponsor_status varchar(64),
    img_dir varchar(255),
    PRIMARY KEY (sponsor_id),
    FOREIGN KEY (admin_id) REFERENCES admin(admin_id)
);

/*---------------------------------------------
Create a new table called scores
This will be used to store the score's info.
-----------------------------------------------*/

CREATE TABLE scores (
    score_id int NOT NULL AUTO_INCREMENT,
    score int NOT NULL,
    judge_id int,
    team_id int,
    PRIMARY KEY (score_id),
    FOREIGN KEY (judge_id) REFERENCES judges(judge_id),
    FOREIGN KEY (team_id) REFERENCES teams(team_id)
);

/*---------------------------------------------
Create a new table called vendors
This will be used to store the vendor's info.
-----------------------------------------------*/

CREATE TABLE vendors (
    vendor_id int NOT NULL AUTO_INCREMENT,
    vendor_name varchar(32) NOT NULL,
    company varchar(32),
    PRIMARY KEY (vendor_id)
);

/*---------------------------------------------
Create a new table called products
This will be used to store the product's info.
-----------------------------------------------*/

CREATE TABLE products (
    product_id int NOT NULL AUTO_INCREMENT,
    product_price decimal(5,2) NOT NULL,
    product_type varchar(32) NOT NULL,
    product_quantity int,
    company varchar(32),
    admin_id int,
    PRIMARY KEY (product_id),
    FOREIGN KEY (admin_id) REFERENCES admin(admin_id)
);

/*---------------------------------------------
Create a new table called invoces
This will be used to store the invoces's info.
-----------------------------------------------*/

CREATE TABLE invoces (
    invoce_id int NOT NULL AUTO_INCREMENT,
    invoce_date date,
    invoce_totalPrice decimal(5,2),
    vendor_id int,
    PRIMARY KEY (invoce_id),
    FOREIGN KEY (vendor_id) REFERENCES vendors(vendor_id)
);

/*---------------------------------------------
Create a new table called HackathonInfo
This will be used to store the invoces's info.
-----------------------------------------------*/

CREATE TABLE HackathonInfo (
    hackathon_id int NOT NULL AUTO_INCREMENT,
    name varchar(32),
    location varchar(32),
    dates varchar(16),
    times varchar(16),
    description varchar(255),
    email varchar(32),
    phone_number numeric(10,0),
    PRIMARY KEY (hackathon_id)
);


/*---------------------------------------------
Create a username called admin
This will be used to excuate the first index.php page.
-----------------------------------------------*/

INSERT INTO admin (username,passw) values('admin',MD5('admin'));
