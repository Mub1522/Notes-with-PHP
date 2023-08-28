CREATE TABLE notes(
    id INT AUTO_INCREMENT,
    ref VARCHAR(255) UNIQUE,
    title VARCHAR(255),
    content text,
    updated date,
    PRIMARY KEY(id)
);
