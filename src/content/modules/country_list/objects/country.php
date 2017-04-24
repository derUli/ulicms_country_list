<?php
class Country {
	protected $id = null;
	protected $countryCode = null;
	protected $countryName = null;
	protected $currencyCode = null;
	protected $fipsCode = null;
	protected $isoNumeric = null;
	protected $north = null;
	protected $east = null;
	protected $capital = null;
	protected $continentName = null;
	protected $languages = null;
	protected $isoAlpha3 = null;
	protected $geonameId = null;
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
	public function loadByCountryCode($countryCode) {
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
	public function loadByCountryName($countryName) {
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
		$this->id = $result->id;
		$this->countryCode = $result->countryCode;
		$this->countryName = $result->countryName;
		$this->currencyCode = $result->currencyCode;
		$this->fipsCode = $result->fipsCode;
		$this->isoNumeric = $result->isoNumeric;
		$this->north = $result->north;
		$this->east = $result->east;
		$this->capital = $result->capital;
		$this->continentName = $result->continentName;
		$this->languages = $result->languages;
		$this->isoAlpha3 = $result->isoAlpha3;
		$this->geonameId = $result->geonameId;
	}
	public function save() {
		if (is_null ( $this->id )) {
			$this->insert ();
		} else {
			$this->update ();
		}
	}
	public function insert() {
		throw new NotImplementedException ();
	}
	public function update() {
		throw new NotImplementedException ();
	}
}