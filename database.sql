<!--
  -- script.sql
  -- damiano.canali@stu.bmcc.cuny.edu
  -- 03/20/2019
-->

DROP DATABASE IF EXISTS csc350;
CREATE DATABASE csc350;
USE csc350;

CREATE TABLE customers (
    id varchar(32),
    pw varchar(32)
);

CREATE TABLE activity (
    user varchar(32),
    time varchar(32),
    type varchar(16)
);
