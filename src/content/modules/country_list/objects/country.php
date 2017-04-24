<?php
class Country {
	public function __construct($id = null) {
		if (! is_null ( $id )) {
			$this->loadById ( $id );
		}
	}
	public function loadById($id) {
		$id = intval ( $id );
		$sql = "select * from {prefix}countries where id = ?";
		$args = array (
				$id 
		);
		$query = Database::pQuery ( $sql, $args, true );
		if (Database::any ( $query )) {
			$this->fillVars ( $query );
		}
	}
	public function loadByCountryCode($id) {
		$countryCode = strval ( $countryCode );
		$sql = "select * from {prefix}countries where countryCode = ?";
		$args = array (
				$countryCode 
		);
		$query = Database::pQuery ( $sql, $args, true );
		if (Database::any ( $query )) {
			$this->fillVars ( $query );
		}
	}
	public function loadByCountryName($id) {
		$countryCode = strval ( $countryName );
		$sql = "select * from {prefix}countries where countryName = ?";
		$args = array (
				$countryName 
		);
		$query = Database::pQuery ( $sql, $args, true );
		if (Database::any ( $query )) {
			$this->fillVars ( $query );
		}
	}
	public function fillVars($query) {
		$result = Database::fetchobject ( $query );
	}
}