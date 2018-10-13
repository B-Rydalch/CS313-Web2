

CREATE TABLE chef (
	id 			 SERIAL 		PRIMARY KEY
	, username 	 VARCHAR(50)	UNIQUE	NOT NULL 
    , password 	 VARCHAR(50) 	NOT NULL
);

CREATE TABLE inventory(
   id               SERIAL 		NOT NULL PRIMARY KEY
   , item_name      VARCHAR(25) NOT NULL
   , quantity       INTEGER 	NOT NULL 
   , best_by		DATE                 
   , parishable     BOOLEAN 	NOT NULL 
   , category       VARCHAR(15) NOT NULL
   , storage_type   VARCHAR(15) NOT NULL 
   , chef_id	 	INT			NOT NULL REFERENCES chef(id)
);



