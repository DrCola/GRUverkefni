create database 1208982809_gru_verkefni

create table notendur
(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    notendanafn varchar(128) NOT NULL UNIQUE,
    lykilorð varchar(128) NOT NULL,
    netfang varchar(128) NOT NULL
);

CREATE table myndir/texti
(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    notandi varchar(128) FOREIGN KEY REFERENCES notendur(notendanafn),
    flokkur_id varchar(128) FOREIGN KEY REFERENCES flokkar(id),
    texti varchar(1500) NOT NULL,
    myndir varchar(128)
);