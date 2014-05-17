CREATE TABLE IF NOT EXISTS `admins` (
  `adminID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `roleID` smallint(5) unsigned NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(75) NOT NULL DEFAULT '',
  `firstname` varchar(75) NOT NULL DEFAULT '',
  `lastname` varchar(75) NOT NULL DEFAULT '',
  `superuser` enum('Y','N') NOT NULL DEFAULT 'N',
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` enum('Y','N') NOT NULL DEFAULT 'N',
  `deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `adminID_created` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `adminID_updated` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`adminID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admins` (`adminID`, `roleID`, `username`, `password`, `email`, `firstname`, `lastname`, `superuser`, `active`, `deleted`, `last_login`, `adminID_created`, `adminID_updated`, `date_created`, `date_updated`)
VALUES (1, 0, 'admin', 'test', '', '', '', 'Y', 'Y', 'Y', '2014-02-22 20:28:58', 0, 0, '0000-00-00 00:00:00', '2014-02-22 20:30:23');


CREATE TABLE IF NOT EXISTS `admins_logs` (
  `logID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adminID` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `classname` varchar(75) NOT NULL DEFAULT '',
  `task` varchar(50) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `ip` varchar(30) NOT NULL DEFAULT '',
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`logID`),
  KEY `adminID` (`adminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `partners` (
  `partnerID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `active` enum('Y','N') NOT NULL DEFAULT 'N',
  `deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `adminID_created` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `adminID_updated` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`partnerID`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `partners_admins` (
  `partnerID` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `adminID` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `adminID_created` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `adminID_updated` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `partnerID_adminID` (`partnerID`,`adminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `partners_configs` (
  `partnerID` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  `adminID_created` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `adminID_updated` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `partnerID_name` (`partnerID`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `admins_roles` (
  `roleID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `permission` text NOT NULL,
  `adminID_created` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `adminID_updated` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`roleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


