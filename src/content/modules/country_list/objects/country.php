<?php
declare(strict_types=1);

class Country
{
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
    public function __construct($id = null)
    {
        if (! is_null($id)) {
            $this->loadById($id);
        }
    }
    public function loadById($id)
    {
        $id = intval($id);
        $sql = "select * from `{prefix}countries` where id = ?";
        $args = array(
                $id
        );
        $query = Database::pQuery($sql, $args, true);
        if (Database::any($query)) {
            $this->fillVars($query);
        }
    }
    public function loadByCountryCode(string $countryCode)
    {
        $countryCode = strval($countryCode);
        $sql = "select * from `{prefix}countries` where countryCode = ?";
        $args = array(
                $countryCode
        );
        $query = Database::pQuery($sql, $args, true);
        if (Database::any($query)) {
            $this->fillVars($query);
        }
    }
    public function loadByCountryName($countryName)
    {
        $countryCode = strval($countryName);
        $sql = "select * from `{prefix}countries` where countryName = ?";
        $args = array(
                $countryName
        );
        $query = Database::pQuery($sql, $args, true);
        if (Database::any($query)) {
            $this->fillVars($query);
        }
    }
    public function fillVars($query)
    {
        $result = Database::fetchobject($query);
        $this->id = intval($result->id);
        $this->countryCode = $result->countryCode;
        $this->countryName = $result->countryName;
        $this->currencyCode = $result->currencyCode;
        $this->fipsCode = $result->fipsCode;
        $this->isoNumeric = $result->isoNumeric;
        $this->north = $result->north ? floatval($result->north) : null;
        $this->east = $result->east ? floatval($result->east) : null;
        $this->west = $result->west ? floatval($result->west) : null;
        $this->south = $result->south ? floatval($result->south) : null;
        $this->capital = $result->capital;
        $this->continent = $result->continent;
        $this->continentName = $result->continentName;
        $this->languages = $result->languages;
        $this->isoAlpha3 = $result->isoAlpha3;
        $this->geonameId = $result->geonameId ? intval($result->geonameId) : null;
    }
    public function save()
    {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }
    protected function insert()
    {
        $sql = "INSERT INTO `{prefix}countries` (`countryCode`, `countryName`, `currencyCode`, `fipsCode`, `isoNumeric`, `north`, `south`, `east`, `west`, `capital`, `continentName`, 
				`continent`, `languages`, `isoAlpha3`, `geonameId`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $args = array(
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
        $result = Database::pQuery($sql, $args, true);
        $this->id = Database::getLastInsertId();
        return $result;
    }
    protected function update()
    {
        $sql = "UPDATE `{prefix}countries` set `countryCode` = ?, `countryName`= ?, `currencyCode` = ?, `fipsCode` = ?, `isoNumeric` = ?, `north` = ?, 
				`south` = ?, `east` = ?, `west` = ?, `capital` = ?, `continentName` = ?, 
				`continent` = ?, `languages` = ?, `isoAlpha3` = ?, `geonameId` = ? where id = ?";
        $args = array(
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
        $result = Database::pQuery($sql, $args, true);
        return $result;
    }
    public function delete()
    {
        if (is_null($this->id)) {
            return false;
        }
        $sql = "delete from `{prefix}countries` where id = ?";
        $args = array(
                $this->id
        );
        $query = Database::pQuery($sql, $args, true);
        $this->id = null;
        return $query;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getCountryCode() : ?string
    {
        return $this->countryCode;
    }
    
    public function getCountryName(): ?string
    {
        return $this->countryName;
    }
    
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }
    
    public function getFipsCode(): ?string
    {
        return $this->fipsCode;
    }
    
    public function getIsoNumeric(): ?string
    {
        return $this->isoNumeric;
    }
    
    public function getNorth(): ?float
    {
        return $this->north;
    }
    
    public function getEast(): ?float
    {
        return $this->east;
    }
    
    public function getSouth(): ?float
    {
        return $this->south;
    }
    
    public function getWest(): ?float
    {
        return $this->west;
    }
    
    public function getCapital(): ?string
    {
        return $this->capital;
    }
    
    public function getContinent(): ?string
    {
        return $this->continent;
    }
    
    public function getContinentName(): ?string
    {
        return $this->continentName;
    }
    
    public function getLanguages(): ?string
    {
        return $this->languages;
    }
    
    public function getIsoAlpha3(): ?string
    {
        return $this->isoAlpha3;
    }
    
    public function getGeonameId(): ?int
    {
        return $this->geonameId;
    }
    
    public function setId(?int $val): void
    {
        $this->id = $val;
    }
    
    public function setCountryCode(?string $val): void
    {
        $this->countryCode = $val;
    }
   
    public function setCountryName(?string $val): void
    {
        $this->countryName = $val;
    }
    
    public function setCurrencyCode(?string $val): void
    {
        $this->currencyCode = $val;
    }
    
    public function setFipsCode(?string $val): void
    {
        $this->fipsCode = $val;
    }
    
    public function setIsoNumeric(?string $val): void
    {
        $this->isoNumeric = $val;
    }
    
    public function setNorth(?float $val): void
    {
        $this->north = $val;
    }
    
    public function setEast(?float $val): void
    {
        $this->east = $val;
    }
    
    public function setSouth(?float $val): void
    {
        $this->south = $val;
    }
    
    public function setWest(?float $val): void
    {
        $this->west = $val;
    }
    
    public function setCapital(?string $val): void
    {
        $this->capital = strval($val);
    }
    
    public function setContinent(?string $val): void
    {
        $this->continent = $val;
    }
    
    public function setContinentName(?string $val): void
    {
        $this->continentName = $val;
    }
    
    public function setLanguages(?string $val): void
    {
        $this->languages = $val;
    }
    
    public function setIsoAlpha3(?string $val): void
    {
        $this->isoAlpha3 = $val;
    }
    
    public function setGeonameId(?int $val): void
    {
        $this->geonameId = $val;
    }
}
