CREATE TABLE IF NOT EXISTS `{prefix}countries` (
	`id` int(5) NOT NULL AUTO_INCREMENT,
	`countryCode` char(2) NOT NULL DEFAULT '',
	`countryName` varchar(45) NOT NULL DEFAULT '',
	`currencyCode` char(3) DEFAULT NULL,
	`fipsCode` char(2) DEFAULT NULL,
	`isoNumeric` char(4) DEFAULT NULL,
	`north` varchar(30) DEFAULT NULL,
	`south` varchar(30) DEFAULT NULL,
	`east` varchar(30) DEFAULT NULL,
	`west` varchar(30) DEFAULT NULL,
	`capital` varchar(30) DEFAULT NULL,
	`continentName` varchar(15) DEFAULT NULL,
	`continent` char(2) DEFAULT NULL,
	`languages` varchar(100) DEFAULT NULL,
	`isoAlpha3` char(3) DEFAULT NULL,
	`geonameId` int(10) DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;