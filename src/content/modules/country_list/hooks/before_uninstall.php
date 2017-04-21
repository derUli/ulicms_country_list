<?php
$migrator = new DBMigrator ( "country_list", getModulePath ( "country_list" ) . "/sql/down" );
$migrator->rollback ();