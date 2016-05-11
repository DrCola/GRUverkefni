CREATE TABLE members 
(
    id INTEGER NOT NULL PRIMARY KEY,
    name VARCHAR(128) NOT NULL,
    CONSTRAINT name UNIQUE (name),
    password VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL,
    CONSTRAINT email UNIQUE (email)
);

CREATE TABLE forums
(
    id INTEGER NOT NULL PRIMARY KEY,
    name VARCHAR(128) NOT NULL,
    CONSTRAINT forum_name UNIQUE ( name ) 
);

CREATE TABLE threads 
(
    id INTEGER NOT NULL PRIMARY KEY,
    name VARCHAR(128) NOT NULL UNIQUE,
    forum_id INTEGER NOT NULL,
    starter INTEGER NOT NULL,
    FOREIGN KEY (forum_id) REFERENCES forums(id),
    FOREIGN KEY (starter) REFERENCES members(id)
);

CREATE TABLE posts 
(
    id INTEGER NOT NULL PRIMARY KEY,
    name VARCHAR(128) NULL,
    thread_id INTEGER NOT NULL,
    reply_to INTEGER NULL,
    posted_by INTEGER NOT NULL,
    created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    revised TIMESTAMP NULL CHECK (revised >= created),
    post TEXT NOT NULL,
    FOREIGN KEY (thread_id) REFERENCES threads(id),
    FOREIGN KEY (posted_by) REFERENCES members(id)
 );