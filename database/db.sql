/* TABLES */
CREATE TABLE users (
  id               INT(255) AUTO_INCREMENT NOT NULL,
  name             VARCHAR(100) NOT NULL,
  lastname        VARCHAR(100) NOT NULL,
  email            VARCHAR(255) NOT NULL,
  password         VARCHAR(255) NOT NULL,
  date_created     DATE NOT NULL,
  PRIMARY KEY (id),
  UNIQUE (email)
) ENGINE=InnoDB;

CREATE TABLE categories (
  id               INT(255) AUTO_INCREMENT NOT NULL,
  name             VARCHAR(100),
  PRIMARY KEY (id)
) ENGINE=InnoDB;


CREATE TABLE posts (
  id               INT(255) AUTO_INCREMENT NOT NULL,
  user_id           INT(255) NOT NULL,
  category_id       INT(255) NOT NULL,
  title             VARCHAR(255) NOT NULL,
  description       MEDIUMTEXT,
  date_created     DATE NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES users(id),
  FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE NO ACTION
) ENGINE=InnoDB;


/* Create posts */
INSERT INTO posts (user_id, category_id, title, description, date_created)
VALUES (
  4,  -- User ID
  4,  -- Category ID 
  'TITLE',
  'DESCRIPTION',
  DATE(CURRENT_TIMESTAMP())
);
