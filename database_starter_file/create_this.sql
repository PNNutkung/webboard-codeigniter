DROP TABLE IF EXIST `user`;
CREATE TABLE user(
    userID INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    joinDate DATETIME NOT NULL DEFAULT NOW(),
    admin INT(2) NOT NULL DEFAULT 0,
    PRIMARY KEY (`userID`)
);

DROP TABLE IF EXIST `thread`;
CREATE TABLE thread(
    threadID INT NOT NULL AUTO_INCREMENT,
    threadName VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
    threadDeatil LONGTEXT COLLATE utf8_unicode_ci NOT NULL,
    createDate DATETIME NOTNULL DEFAULT NOW(),
    PRIMARY KEY (`threadID`),
    FOREIGN KEY (`ownerID`) REFERENCES user(`userID`)
);
