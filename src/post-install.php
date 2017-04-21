<?php
$migrator = new DBMigrator ( "country_list", getModulePath ( "country_list" ) . "/sql/up" );
$migrator->migrate ();