<?php
$migrator = new DBMigrator("country_list", getModulePath("country_list", true) . "sql/up");
$migrator->migrate();
