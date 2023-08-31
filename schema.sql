-- Table `notes`
CREATE TABLE notes(
    id INT AUTO_INCREMENT,
    ref VARCHAR(255) UNIQUE,
    title VARCHAR(255),
    content text,
    color VARCHAR(255),
    updated date,
    PRIMARY KEY(id)
);

-- Inserts (Examples)
INSERT INTO `notes` (`ref`,`title`,`content`,`color`,`updated`) VALUES ('64f0a18d142a8','Title 1','content 1','blue','2023-08-31');
INSERT INTO `notes` (`ref`,`title`,`content`,`color`,`updated`) VALUES ('64f0a197dbf52','Title 2','content 2','green','2023-08-31');
INSERT INTO `notes` (`ref`,`title`,`content`,`color`,`updated`) VALUES ('64f0a1a2c988d','Title 3','content 3','yellow','2023-08-31');
INSERT INTO `notes` (`ref`,`title`,`content`,`color`,`updated`) VALUES ('64f0a1b34a4bb','Title 4','content 4','brown','2023-08-31');
INSERT INTO `notes` (`ref`,`title`,`content`,`color`,`updated`) VALUES ('64f0a1c206967','Title 5','content 5','purple','2023-08-31');
INSERT INTO `notes` (`ref`,`title`,`content`,`color`,`updated`) VALUES ('64f0a1cd908dd','Title 6','content 6','orange','2023-08-31');

