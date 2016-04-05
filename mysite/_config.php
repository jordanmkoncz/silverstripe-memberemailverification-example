<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	'type' => 'MySQLPDODatabase',
	'server' => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'database' => 'mev_db',
	'path' => ''
);

// Set the site locale
i18n::set_locale('en_GB');

// Log all notices, warnings and errors to /logs/silverstripe.log
SS_Log::add_writer(new SS_LogFileWriter(Director::baseFolder() . '/logs/silverstripe.log'), SS_Log::NOTICE, '<=');