CREATE TABLE Crowd
(
    id              INT(6)      UNSIGNED AUTO_INCREMENT PRIMARY KEY
    ,title          VARCHAR(30) NOT NULL
    ,optionOne      VARCHAR(30) NOT NULL
    ,optionTwo      VARCHAR(30) NULL
    ,optionThree    VARCHAR(30) NULL
    ,optionFour     VARCHAR(30) NULL
);