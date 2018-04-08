CREATE TABLE Crowd
(
    id              INT(6)      UNSIGNED AUTO_INCREMENT PRIMARY KEY
    ,title          VARCHAR(30) NOT NULL
    ,optionOne      VARCHAR(30) NOT NULL
    ,optionTwo      VARCHAR(30) NULL
    ,optionThree    VARCHAR(30) NULL
    ,optionFour     VARCHAR(30) NULL
    ,oneVal         INT(6)      NULL DEFAULT 0
    ,twoVal         INT(6)      NULL DEFAULT 0
    ,threeVal       INT(6)      NULL DEFAULT 0
    ,fourVal        INT(6)      NULL DEFAULT 0
);