<?php
class CountryListHelper extends Helper{
  public function getAllCountries($language = null){
      if(!$language){
          $language = getCurrentLanguage(true);
      }
      $file = getModulePath("country_list", true) . "/" . $language . ".txt";
      // @FIXME: Prüfen ob Datei existiert
      // und Exception werfen wenn Datei nicht vorhanden
      $data = file_get_contents($data);
      
  }
}
