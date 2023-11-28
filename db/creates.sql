drop database if exists codelabhor;

CREATE DATABASE IF NOT EXISTS codelabhor
DEFAULT CHARACTER SET utf8
COLLATE utf8_general_ci;

use codelabhor;

create table Klasse(
    klasseid varchar(3) primary key
);

create table Person(
    personid int primary key not null auto_increment,
    email varchar(25),
    nachname varchar(25),
    vorname varchar(25),
    rolle varchar(1),
    fk_klasse varchar(3),
    foreign key (fk_klasse) references Klasse(klasseid)
);

create table Beispiel(
    beispielid int auto_increment primary key,
    #pfad varchar(30), -> Pfad ist immer der selbe
    name varchar(30)
);

create table Testcase(
    testid int auto_increment primary key,
    fk_author int,
    fk_beispiel int,
    foreign key (fk_beispiel) references Beispiel(beispielid),
    foreign key (fk_author) references Person(personid)
);

-- Tests
create table PersonTest(
    persontestid int primary key,
    personid int,
    testid int,
    foreign key (personid) references Person(personid),
    foreign key (testid) references Testcase(testid)
);

create table Ranking(
    abgabeid int primary key auto_increment,
    personid int,
    beispiel int,
    testcases int,
    successfull_tests int,
    foreign key (personid) references Person(personid),
    foreign key (beispiel) references Beispiel(beispielid),
    foreign key (testcases) references Testcase(testid)
)