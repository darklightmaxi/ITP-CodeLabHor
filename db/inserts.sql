use codelabhor;

insert into Klasse(klasseid)
VALUES
    ('1AI'),
    ('1BI'),
    ('1CI'),
    ('2AI'),
    ('2BI'),
    ('2CI'),
    ('3AI'),
    ('3BI'),
    ('3CI'),
    ('4AI'),
    ('4BI'),
    ('4CN'),
    ('5AX'),
    ('5BI'),
    ('5CN');

insert into Person(email, password, nachname, vorname, rolle, fk_klasse)
VALUES
    ('9039@htl.rennweg.at', '1', 'Kniely', 'Maximilian', 'S', '5AX'),
    ('9118@htl.rennweg.at', '1', 'Bierbaumer', 'Martin', 'L', '5CN'),
    ('bre@htl.rennweg.at', '1', 'Breunig', 'Franz', 'L', NULL),
    ('hol@htl.rennweg.at', '1', 'Hölzl', 'Günther', 'L', NULL),
    ('kle@htl.rennweg.at', '1', 'Klein', 'Christian', 'L', NULL),
    ('zai@htl.rennweg.at', '1', 'Zainzinger', 'Harald', 'L', NULL),
    ('wag@htl.rennweg.at', '1', 'Wagner', 'Matthias', 'L', NULL),
    ('nic@htl.rennweg.at', '1', 'Nickel', 'Bernhard', 'L', NULL),
    ('bis@htl.rennweg.at', '1', 'Bischl', 'Michael', 'L', NULL);

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
