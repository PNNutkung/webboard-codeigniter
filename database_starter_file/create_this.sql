CREATE TABLE IF NOT EXISTS `users`(
    userID INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    joinDate DATETIME NOT NULL DEFAULT NOW(),
    isAdmin TINYINT(1) NOT NULL DEFAULT 0,
    isConfirm TINYINT(1) NOT NULL DEFAULT 0,
    isDelete TINYINT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (`userID`)
);

CREATE TABLE IF NOT EXISTS `thread`(
    threadID INT NOT NULL AUTO_INCREMENT,
    threadName VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
    threadDetail LONGTEXT COLLATE utf8_unicode_ci NOT NULL,
    createDate DATETIME NOT NULL DEFAULT NOW(),
    ownerID INT NOT NULL,
    PRIMARY KEY (`threadID`),
    FOREIGN KEY (`ownerID`) REFERENCES users(`userID`)
);

CREATE TABLE IF NOT EXISTS `comment`(
    commentID INT NOT NULL AUTO_INCREMENT,
    commentDetail LONGTEXT COLLATE utf8_unicode_ci NOT NULL,
    createDate DATETIME NOT NULL DEFAULT NOW(),
    ownerID INT NOT NULL,
    PRIMARY KEY (`commentID`),
    FOREIGN KEY (`ownerID`) REFERENCES users(`userID`)
);

CREATE TABLE IF NOT EXISTS `board`(
    boardID INT NOT NULL AUTO_INCREMENT,
    threadID INT NOT NULL,
    commentID INT NOT NULL,
    PRIMARY KEY (`boardID`),
    FOREIGN KEY (`threadID`) REFERENCES thread(`threadID`),
    FOREIGN KEY (`commentID`) REFERENCES comment(`commentID`)
);
