<?php

$createSubmissionsTable = "CREATE TABLE IF NOT EXISTS `submissions` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `url` text NOT NULL,
 `submitter` text NOT NULL,
 `votesfor` int(3) NOT NULL DEFAULT '0',
 `votesagainst` int(3) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$createUsersTable = "CREATE TABLE IF NOT EXISTS `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `password` text NOT NULL,
 `enabled` tinyint(1) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

