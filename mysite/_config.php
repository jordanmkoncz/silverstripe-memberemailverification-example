<?php

global $project;
$project = 'mysite';

// Set the site locale
i18n::set_locale('en_GB');

// Log all notices, warnings and errors to /logs/silverstripe.log
SS_Log::add_writer(new SS_LogFileWriter(Director::baseFolder() . '/logs/silverstripe.log'), SS_Log::NOTICE, '<=');

// Use _ss_environment.php file for configuration
require_once('conf/ConfigureFromEnv.php');