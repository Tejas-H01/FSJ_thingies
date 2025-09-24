-- Create database
CREATE DATABASE IF NOT EXISTS studentdb;

-- Use database
USE studentdb;

-- Create table
CREATE TABLE IF NOT EXISTS student (
    ID INT PRIMARY KEY,
    Name VARCHAR(50),
    Age INT,
    City VARCHAR(50),
    Address VARCHAR(100)
);

-- Insert students
INSERT INTO student (ID, Name, Age, City) VALUES
(1, 'Rahul Sharma', 18, 'Mumbai'),
(2, 'Priya Iyer', 19, 'Chennai'),
(3, 'Arjun Patel', 20, 'Ahmedabad'),
-- add all other entries...
;

 
