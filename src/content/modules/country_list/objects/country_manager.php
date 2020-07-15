<?php
class CountryManager
{
    public function getAll($order = "id")
    {
        $data = array();
        $sql = "select id from `{prefix}countries` order by $order";
        $query = Database::query($sql, true);
        if (Database::any($query)) {
            while ($row = Database::fetchObject($query)) {
                $data [] = new Country($row->id);
            }
        }
        return $data;
    }
    public function getAllByCurrencyCode($currencyCode, $order = "id")
    {
        $data = array();
        $sql = "select id from `{prefix}countries` where `currencyCode` = ? order by $order";
        $args = array(
                $currencyCode
        );
        $query = Database::pQuery($sql, $args, true);
        if (Database::any($query)) {
            while ($row = Database::fetchObject($query)) {
                $data [] = new Country($row->id);
            }
        }
        return $data;
    }
    public function getAllByContinent($continent, $order = "id")
    {
        $data = array();
        $sql = "select id from `{prefix}countries` where `continent` = ? order by $order";
        $args = array(
                $continent
        );
        $query = Database::pQuery($sql, $args, true);
        if (Database::any($query)) {
            while ($row = Database::fetchObject($query)) {
                $data [] = new Country($row->id);
            }
        }
        return $data;
    }
    public function getAllByContinentName($continentName, $order = "id")
    {
        $data = array();
        $sql = "select id from `{prefix}countries` where `continentName` = ? order by $order";
        $args = array(
                $continentName
        );
        $query = Database::pQuery($sql, $args, true);
        if (Database::any($query)) {
            while ($row = Database::fetchObject($query)) {
                $data [] = new Country($row->id);
            }
        }
        return $data;
    }
}
