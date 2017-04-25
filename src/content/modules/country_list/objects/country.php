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
	protected $south = null;
	protected $west = null;
	protected $capital = null;
	protected $continent = null;
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
		$sql = "select * from `{prefix}countries` where id = ?";
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
		$sql = "select * from `{prefix}countries` where countryCode = ?";
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
		$sql = "select * from `{prefix}countries` where countryName = ?";
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
		$this->west = $result->west;
		$this->south = $result->south;
		$this->capital = $result->capital;
		$this->continent = $result->continent;
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
	protected function insert() {
		$sql = "INSERT INTO `{prefix}countries` (`countryCode`, `countryName`, `currencyCode`, `fipsCode`, `isoNumeric`, `north`, `south`, `east`, `west`, `capital`, `continentName`, 
				`continent`, `languages`, `isoAlpha3`, `geonameId`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$args = array (
				$this->countryCode,
				$this->countryName,
				$this->currencyCode,
				$this->fipsCode,
				$this->isoNumeric,
				$this->north,
				$this->south,
				$this->east,
				$this->west,
				$this->capital,
				$this->continentName,
				$this->continent,
				$this->languages,
				$this->isoAlpha3,
				$this->geonameId 
		);
		$result = Database::pQuery ( $sql, $args, true );
		$this->id = Database::getLastInsertId ();
		return $result;
	}
	protected function update() {
		$sql = "UPDATE `{prefix}countries` set `countryCode` = ?, `countryName`= ?, `currencyCode` = ?, `fipsCode` = ?, `isoNumeric` = ?, `north` = ?, 
				`south` = ?, `east` = ?, `west` = ?, `capital` = ?, `continentName` = ?, 
				`continent` = ?, `languages` = ?, `isoAlpha3` = ?, `geonameId` = ? where id = ?";
		$args = array (
				$this->countryCode,
				$this->countryName,
				$this->currencyCode,
				$this->fipsCode,
				$this->isoNumeric,
				$this->north,
				$this->south,
				$this->east,
				$this->west,
				$this->capital,
				$this->continentName,
				$this->continent,
				$this->languages,
				$this->isoAlpha3,
				$this->geonameId,
				$this->id 
		);
		$result = Database::pQuery ( $sql, $args, true );
		return $result;
	}
	public function delete() {
		if (is_null ( $this->id )) {
			return false;
		}
		$sql = "delete from `{prefix}countries` where id = ?";
		$args = array (
				$this->id 
		);
		$query = Database::pQuery ( $sql, $args, true );
		$this->id = null;
		return $query;
	}
	public function getId() {
		return $this->id;
	}
	public function getCountryCode() {
		return $this->countryCode;
	}
	public function getCountryName() {
		return $this->countryName;
	}
	public function getCurrencyCode() {
		return $this->currencyCode;
	}
	public function getFipsCode() {
		return $this->fipsCode;
	}
	public function getIsoNumeric() {
		return $this->isoNumeric;
	}
	public function getNorth() {
		return $this->north;
	}
	public function getEast() {
		return $this->east;
	}
	public function getSouth() {
		return $this->south;
	}
	public function getWest() {
		return $this->west;
	}
	public function getCapital() {
		return $this->capital;
	}
	public function getContinent() {
		return $this->continent;
	}
	public function getContinentName() {
		return $this->continentName;
	}
	public function getLanguages() {
		return $this->languages;
	}
	public function getIsoAlpha3() {
		return $this->isoAlpha3;
	}
	public function getGeonameId() {
		return $this->geonameId;
	}
	public function setId($val) {
		$this->id = intval ( $val );
	}
	public function setCountryCode($val) {
		$this->countryCode = StringHelper::isNotNullOrWhitespace ( $val ) ? strval ( $val ) : null;
	}
	public function setCountryName($val) {
		$this->countryName = StringHelper::isNotNullOrWhitespace ( $val ) ? strval ( $val ) : null;
	}
	public function setCurrencyCode($val) {
		$this->currencyCode = StringHelper::isNotNullOrWhitespace ( $val ) ? strval ( $val ) : null;
	}
	public function setFipsCode($val) {
		$this->fipsCode = StringHelper::isNotNullOrWhitespace ( $val ) ? strval ( $val ) : null;
	}
	public function setIsoNumeric($val) {
		$this->isoNumeric = StringHelper::isNotNullOrWhitespace ( $val ) ? strval ( $val ) : null;
	}
	public function setNorth($val) {
		$this->north = StringHelper::isNotNullOrWhitespace ( $val ) ? floatval ( $val ) : null;
	}
	public function setEast($val) {
		$this->east = StringHelper::isNotNullOrWhitespace ( $val ) ? floatval ( $val ) : null;
	}
	public function setSouth($val) {
		$this->south = StringHelper::isNotNullOrWhitespace ( $val ) ? floatval ( $val ) : null;
	}
	public function setWest($val) {
		$this->west = StringHelper::isNotNullOrWhitespace ( $val ) ? floatval ( $val ) : null;
	}
	public function setCapital($val) {
		$this->capital = StringHelper::isNotNullOrWhitespace ( $val ) ? strval ( $val ) : null;
	}
	public function setContinent($val) {
		$this->continent = StringHelper::isNotNullOrWhitespace ( $val ) ? strval ( $val ) : null;
	}
	public function setContinentName($val) {
		$this->continentName = StringHelper::isNotNullOrWhitespace ( $val ) ? strval ( $val ) : null;
	}
	public function setLanguages($val) {
		$this->languages = StringHelper::isNotNullOrWhitespace ( $val ) ? strval ( $val ) : null;
	}
	public function setIsoAlpha3($val) {
		$this->isoAlpha3 = StringHelper::isNotNullOrWhitespace ( $val ) ? strval ( $val ) : null;
	}
	public function setGeonameId($val) {
		$this->geonameId = StringHelper::isNotNullOrWhitespace ( $val ) ? intval ( $val ) : null;
	}
}