<?php

include_once dirname(__FILE__) . "/CountryListBaseTest.php";

class CountryListTest extends CountryListBaseTest
{
    public function testLoadByCountryCode()
    {
        $country = new Country();
        $country->loadByCountryCode("KP");
        $this->assertEquals(121, $country->getId());
        $this->assertEquals("KP", $country->getCountryCode());
        $this->assertEquals("North Korea", $country->getCountryName());
        $this->assertEquals("KN", $country->getFipsCode());
        $this->assertEquals("408", $country->getIsoNumeric());
        $this->assertEquals(43.006054, $country->getNorth());
        $this->assertEquals(37.673332, $country->getSouth());
        $this->assertEquals(130.674866, $country->getEast());
        $this->assertEquals(124.315887, $country->getWest());
        $this->assertEquals("Pyongyang", $country->getCapital());
        $this->assertEquals("Asia", $country->getContinentName());
        $this->assertEquals("AS", $country->getContinent());
        $this->assertEquals("ko-KP", $country->getLanguages());
        $this->assertEquals("PRK", $country->getIsoAlpha3());
        $this->assertEquals(1873107, $country->getGeonameId());
    }

    public function testLoadByName()
    {
        $country = new Country();
        $country->loadByCountryName("North Korea");
        $this->assertEquals(121, $country->getId());
        $this->assertEquals("KP", $country->getCountryCode());
        $this->assertEquals("North Korea", $country->getCountryName());
        $this->assertEquals("KN", $country->getFipsCode());
        $this->assertEquals("408", $country->getIsoNumeric());
        $this->assertEquals(43.006054, $country->getNorth());
        $this->assertEquals(37.673332, $country->getSouth());
        $this->assertEquals(130.674866, $country->getEast());
        $this->assertEquals(124.315887, $country->getWest());
        $this->assertEquals("Pyongyang", $country->getCapital());
        $this->assertEquals("Asia", $country->getContinentName());
        $this->assertEquals("AS", $country->getContinent());
        $this->assertEquals("ko-KP", $country->getLanguages());
        $this->assertEquals("PRK", $country->getIsoAlpha3());
        $this->assertEquals(1873107, $country->getGeonameId());
    }

    public function testLoadById()
    {
        $country = new Country(121);
        $this->assertNotNull($country->getId());
        $this->assertEquals("KP", $country->getCountryCode());
        $this->assertEquals("North Korea", $country->getCountryName());
        $this->assertEquals("KN", $country->getFipsCode());
        $this->assertEquals("408", $country->getIsoNumeric());
        $this->assertEquals(43.006054, $country->getNorth());
        $this->assertEquals(37.673332, $country->getSouth());
        $this->assertEquals(130.674866, $country->getEast());
        $this->assertEquals(124.315887, $country->getWest());
        $this->assertEquals("Pyongyang", $country->getCapital());
        $this->assertEquals("Asia", $country->getContinentName());
        $this->assertEquals("AS", $country->getContinent());
        $this->assertEquals("ko-KP", $country->getLanguages());
        $this->assertEquals("PRK", $country->getIsoAlpha3());
        $this->assertEquals(1873107, $country->getGeonameId());
    }

    public function testCreateAndDelete()
    {
        $country = new Country();
        $country->delete();
        $country->setCountryCode("LP");
        $country->setCountryName("Lampukistan");
        $country->setFipsCode("LM");
        $country->setIsoNumeric("666");
        $country->setNorth(43.006054);
        $country->setSouth(37.673332);
        $country->setEast(130.674866);
        $country->setWest(124.315887);
        $country->setCapital("Porada Ninfu");
        $country->setContinentName("Asia");
        $country->setContinent("AS");
        $country->setLanguages("lp-LP");
        $country->setIsoAlpha3("LMP");
        $country->setGeonameId(123456765);
        $country->save();
        $this->assertNotNull($country->getId());
        $this->assertEquals("LP", $country->getCountryCode());
        $this->assertEquals("Lampukistan", $country->getCountryName());
        $this->assertEquals("LM", $country->getFipsCode());
        $this->assertEquals("666", $country->getIsoNumeric());
        $this->assertEquals(43.006054, $country->getNorth());
        $this->assertEquals(37.673332, $country->getSouth());
        $this->assertEquals(130.674866, $country->getEast());
        $this->assertEquals(124.315887, $country->getWest());
        $this->assertEquals("Porada Ninfu", $country->getCapital());
        $this->assertEquals("Asia", $country->getContinentName());
        $this->assertEquals("AS", $country->getContinent());
        $this->assertEquals("lp-LP", $country->getLanguages());
        $this->assertEquals("LMP", $country->getIsoAlpha3());
        $this->assertEquals(123456765, $country->getGeonameId());

        $id = $country->getId();

        $country = new Country($id);
        $this->assertNotNull($country->getId());
        $this->assertEquals("LP", $country->getCountryCode());
        $this->assertEquals("Lampukistan", $country->getCountryName());
        $this->assertEquals("LM", $country->getFipsCode());
        $this->assertEquals("666", $country->getIsoNumeric());
        $this->assertEquals(43.006054, $country->getNorth());
        $this->assertEquals(37.673332, $country->getSouth());
        $this->assertEquals(130.674866, $country->getEast());
        $this->assertEquals(124.315887, $country->getWest());
        $this->assertEquals("Porada Ninfu", $country->getCapital());
        $this->assertEquals("Asia", $country->getContinentName());
        $this->assertEquals("AS", $country->getContinent());
        $this->assertEquals("lp-LP", $country->getLanguages());
        $this->assertEquals("LMP", $country->getIsoAlpha3());
        $this->assertEquals(123456765, $country->getGeonameId());
        $country->setCapital("Lampaka");
        $this->assertEquals("Lampaka", $country->getCapital());
        $country->save();
        $country = new Country($id);

        $this->assertEquals("Lampaka", $country->getCapital());
        $country->delete();
        $country = new Country($id);
        $this->assertNull($country->getId());
    }

    public function testGetCurrencyCode()
    {
        $country = new Country();
        $country->setId(123);
        $country->setCurrencyCode("$");
        $this->assertEquals(123, $country->getId());
        $this->assertEquals("$", $country->getCurrencyCode());
    }
}
