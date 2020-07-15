<?php

abstract class CountryListBaseTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        $migrator = new DBMigrator(
            "country_list",
            getModulePath("country_list", true) . "sql/up"
        );
        $migrator->migrate();
    }

    protected function tearDown(): void
    {
        $migrator = new DBMigrator(
            "country_list",
            getModulePath("country_list", true) . "sql/down"
        );
        $migrator->rollback();
    }
}
