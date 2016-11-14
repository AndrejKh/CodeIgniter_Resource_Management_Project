
USE db; -- insert correct database name...



CREATE TABLE IF NOT EXISTS `user_account` (
  `accountID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, 
  `username` VARCHAR(20) NOT NULL,
  `typeID` int(10) UNSIGNED NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`accountID`),
  FOREIGN KEY (`typeID`) REFERENCES account_type(`typeID`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `person` (
  `personID` int (10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` char(50) NOT NULL,
  `lastname` char(50) NOT NULL,
  `addressID` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`personID`),
  FOREIGN KEY (`personID`) REFERENCES user_account(`accountID`) ON DELETE CASCADE,
  FOREIGN KEY (`addressID`) REFERENCES address(`addressID`) ON DELETE CASCADE
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `account_type`(
  `typeID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `typeName` VARCHAR (20) NOT NULL,
  `description` VARCHAR (255),
  PRIMARY KEY (`typeID`),
) ENGINE = InnoDB;

-- not sure about foreign keys below. I think they're correct
CREATE TABLE IF NOT EXISTS `project_assignment`(
  `assignID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR (30) NOT NULL,
  `startDate` DATE NOT NULL,
  `endDate` DATE NOT NULL,
  `role` VARCHAR (30) NOT NULL,
  PRIMARY KEY (`assignID`),
  FOREIGN KEY (`assignID`) REFERENCES project(`projectID`) ON DELETE CASCADE,
  FOREIGN KEY (`assignID`) REFERENCES user_account(`accountID`) ON DELETE CASCADE

) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `project`(
  `projectID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR (30) NOT NULL,
  `startDate` DATE NOT NULL,
  `endDate` DATE NOT NULL,
  `skillsRequiredID` int(10) NOT NULL,
  `budget` DECIMAL NOT NULL,
  `projectTypeID` VARCHAR(100),
  `completed` BIT(1) NOT NULL, -- 0 r 1, 0 false, 1 true (beter for storage than BOOL apparently.
  PRIMARY KEY (`projectID`)

) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `address`(
  `addressID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `country` VARCHAR(20) NOT NULL,
  `city` VARCHAR(20) NOT NULL,
  `postcode` VARCHAR () NOT NULL, -- need max length of postcode
  `streetName` VARCHAR(30) NOT NULL,
  `buldingNumber` INT(5) NOT NULL,
  PRIMARY KEY(`addressID`),
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `skills`(
  `skillID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `skillName` VARCHAR(20) NOT NULL UNIQUE,
  PRIMARY KEY (`skillID`)
) ENGINE = InnoDB;

-- not sure about the foreign keys below
CREATE TABLE IF NOT EXISTS `project_skills_required`(
  `skillID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `skillName` VARCHAR(20) NOT NULL UNIQUE,
  PRIMARY KEY (`skillID`),
  FOREIGN KEY (`skillID`) REFERENCES skills(`SkillID`),
  FORIEGN KEY (`skillID`) REFERENCES project(`skillsRequiredID`)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `user_skills` (
  `accountID` int(10) UNSIGNED NOT NULL,
  `skillID` int(10) UNSIGNED NOT NULL,
  `experience` VARCHAR (255) NOT NULL,
  `achievements` VARCHAR (255) NOT NULL,
  PRIMARY KEY (`accountID`),
  FOREIGN KEY (`accountID`) REFERENCES user_account(`accountID`),
  FOREIGN KEY (`skillID`) REFERENCES skills(`skillID`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `skillLevel`(
  `levelID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `level` int(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`levelID`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `leave`(
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `startDate` DATE NOT NULL,
  `endDate` DATE, -- can be null because might not know when back if ill...?
  -- is it ethically right to store information about an employees leave if health related?
  `leaveType` int(2)UNSIGNED NOT NULL UNIQUE,
  FOREIGN KEY (`leaveType`) REFERENCES leave_type(`leaveType`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `leave_type`(
  `typeID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `leaveType` int(2) UNSIGNED NOT NULL UNIQUE,
  `leaveTypeDesc` VARCHAR(255) NOT NULL,
  PRIMARY KEY(`typeID`),
  FOREIGN KEY(`typeID`) REFERENCES leave(`leaveType`)
) ENGINE = InnoDB: