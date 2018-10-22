CREATE TABLE scriptures
(
    id SERIAL PRIMARY KEY
    , book VARCHAR(20) NOT NULL
    , chapter SMALLINT NOT NULL
    , verse SMALLINT NOT NULL
    , content TEXT NOT NULL
);

INSERT INTO scriptures (book, chapter, verse, content) VALUES
('John', 1, 5, 'And the light shineth in darkness,; and the darkness comprehended it not.');

INSERT INTO scriptures (book, chapter, verse, content) VALUES
('D & C', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God being quickened in him and by him.');

INSERT INTO scriptures (book, chapter, verse, content) VALUES
('D & C', 93, 28, 'He that keepth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');

INSERT INTO scriptures (book, chapter, verse, content) VALUES
('D & C', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God being quickened in him and by him.');

INSERT INTO scriptures (book, chapter, verse, content) VALUES
('Mosiah', 16, 9, 'He is the light and the life of the world; year, a light that is endless, that can never be darkened; year, and also a life which is endless, that there can be no more death.');



/* Brother Burton class activity */ 
CREATE TABLE actor (
    id SERIAL PRIMARY KEY
    , name VARCHAR(100) NOT NULL
    , birthYear SMALLINT
);

CREATE TABLE movie (
    id SERIAL PRIMARY KEY
    , title VARCHAR(100)
    , runtime SMALLINT
    , year SMALLINT
);

CREATE TABLE actor_movie (
    id SERIAL PRIMARY KEY 
    , actor_id INT NOT NULL REFERENCES actor(id)
    , movie_id INT NOT NULL REFERENCES movie(id)

);

INSERT INTO actor (name,birthYear) VALUES ('Jimmy Stewart', 1908);
INSERT INTO actor (name,birthYear) VALUES ('Chris Pratt', 1979);
INSERT INTO actor (name,birthYear) VALUES 
    ('Tom Cruise', 1962),
    ('Meryl Streen', 1949), 
    ('Carrie Fisher', 1956);

INSERT INTO movie (title,runtime,year) VALUES 
    ('It''s a wonderful life', 120, 2957), 
    ('The Devil wears prada', 125,2006), 
    ('Guardians of the Galaxy', 140, 2014);


INSERT INTO actor_movie(actor_id, movie_id) VALUES 
    (2,3),
    (1,1),
    (1,3);