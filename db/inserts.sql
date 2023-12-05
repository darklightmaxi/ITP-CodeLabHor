use codelabhor;

insert into Klasse(klasseid)
VALUES
    ('1AI'),
    ('1BI'),
    ('1CI'),
    ('5AX'),
    ('5CN');

insert into Person(email, nachname, vorname, rolle, fk_klasse)
VALUES
    ('9039@htl.rennweg.at', 'Kniely', 'Maximilian', 'S', '5AX'),
    ('9118@htl.rennweg.at', 'Bierbaumer', 'Martin', 'L', NULL),
    ('bre@htl.rennweg.at', 'Breunig', 'Franz', 'L', NULL),
    ('hol@htl.rennweg.at', 'Hölzl', 'Günther', 'L', NULL),
    ('kle@htl.rennweg.at', 'Klein', 'Christian', 'L', NULL),
    ('zai@htl.rennweg.at', 'Zainzinger', 'Harald', 'L', NULL),
    ('wag@htl.rennweg.at', 'Wagner', 'Matthias', 'L', NULL),
    ('nic@htl.rennweg.at', 'Nickel', 'Bernhard', 'L', NULL),
    ('bis@htl.rennweg.at', 'Bischl', 'Michael', 'L', NULL);

insert into Beispiel(name)
VALUES
    ('isPalindrom'),
    ('LottoTipp'),
    ('isLeapYear'),
    ('Calculator'),
    ('isPrime');

insert into Testcase(fk_author, fk_beispiel)
VALUES
    (1, 1),
    (2, 1),
    (2, 1);
