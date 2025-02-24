
CREATE DATABASE collegeDB;
USE collegeDB;
CREATE TABLE subjects(
	code VARCHAR(8) NOT NULL,
	title VARCHAR(50) NOT NULL,
	credit  SMALLINT(1) UNSIGNED NOT NULL,
	yearOfStudy TINYINT(1) UNSIGNED NOT NULL,
	PRIMARY KEY (code)
);

INSERT INTO subjects VALUES ('CS101','Information Technology',3, 1);
INSERT INTO subjects VALUES ('CS204','Computer Architecture',4, 1);
INSERT INTO subjects VALUES ('BM302','Bahasa Malaysia',2, 3);
INSERT INTO subjects VALUES ('CS323','Data Science',3, 3);
INSERT INTO subjects VALUES ('CS222','Artificial Intelligence',2, 2);
INSERT INTO subjects VALUES ('PM121','Moral',1, 1);

