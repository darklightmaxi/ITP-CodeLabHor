use codelabhor;

insert into Klasse(klasseid)
VALUES
    ('1AI'),
    ('1BI'),
    ('1CI'),
    ('5AX'),
    ('5CN');

insert into Person(kuerzel, schuelerid, rolle, fk_klasse)
VALUES
    # Festgelegte Schüler
    (NULL, 9039, 'S', '5AX'),   #Maxi
    (NULL, 9038, 'S', '5AX'),   #Valerie
    (NULL, 9118, 'S', '5CN'),   #Martin

    # Lehrer
    ('BRE', NULL, 'L', NULL),
    ('KLE', NULL, 'L', NULL),
    ('SDO', NULL, 'L', NULL),
    ('WAG', NULL, 'L', NULL),
    ('ZAI', NULL, 'L', NULL),
    ('HOR', NULL, 'L', NULL),
    ('HOL', NULL, 'L', NULL);

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
    (3, 1),
    (2, 1);
