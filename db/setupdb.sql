DROP TABLE chef CASCADE;
DROP TABLE inventory CASCADE; 
DROP TABLE shopping CASCADE; 

CREATE TABLE chef (
	id 			 SERIAL 		PRIMARY KEY
	, username 	 VARCHAR(50)	UNIQUE	NOT NULL 
    , password 	 VARCHAR(50) 	NOT NULL
);

CREATE TABLE shopping (
    id              SERIAL      PRIMARY KEY
    , item_name     VARCHAR(50) NOT NULL 
    , quantity      SMALLINT    NOT NULL
    , category      VARCHAR(50) NOT NULL 
    , chef_id       INT         NOT NULL 
);

CREATE TABLE inventory (
   id               SERIAL 	    PRIMARY KEY
   , item_name      VARCHAR(50) NOT NULL
   , quantity       INTEGER 	NOT NULL 
   , best_by		DATE                 
   , perishable     BOOLEAN 	NOT NULL 
   , category       VARCHAR(50) NOT NULL /* fruits, vegetables, etc*/
   , storage_type   VARCHAR(50) NOT NULL /* BOXED noodles, DRIED fruits, BAGGED  */ 
   , chef_id	 	INT			NOT NULL REFERENCES chef(id)
   , shopping_id    INT         NULL    REFERENCES shopping(id)
);

/****DEFAULT DATA*****/
INSERT INTO chef (username,password) VALUES('kelebra0188','password');

INSERT INTO inventory(item_name, quantity,best_by,perishable, category, storage_type, chef_id) 
VALUES ('macaroni and cheese', 3, '2019-11-19', FALSE, 'noodles', 'box', 1)
       , ('mashed potatoes', 2, '2019-12-01', FALSE, 'dried', 'box', 1)
       , ('green grapes', 1, '2018-10-31', True, 'fruit', 'bag', 1)
       , ('toilet paper', 23, NULL, False, 'household', 'bag', 1);