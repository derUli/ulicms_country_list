<?php
class CountryListHelper extends Helper{
  public function getAllCountries($language = null, $folder = "default"){
      $result = array();
      if(!$language){
          $language = getCurrentLanguage(true);
      }
      $file = getModulePath("country_list", true) . "/data/" .$folder. "/" . $language . ".txt";
      // @FIXME: Prüfen ob Datei existiert
      // und Exception werfen wenn Datei nicht vorhanden
      $data = file_get_contents($data);
      $data = normalizeLN($data, "\n");
      $data = explode("\n", $data);
      foreach($data as $line){
          $myLine = trim($line);
          if(!empty($myLine)){
              $splitted = explode(":", $myLine);
              $country = new Country();
              $country->code = trim($splitted[0]);
              $country->name = trim($splitted[1]);
              $result[] = $country;
          }

      }
      return $result;
  }
  public function getCountryByCode($code, $language = null, $folder = "default"){
      $result = null;
      if(!$language){
          $language = getCurrentLanguage(true);
      }
      $file = getModulePath("country_list", true) . "/data/" . $folder. "/" . $language . ".txt";
      // @FIXME: Prüfen ob Datei existiert
      // und Exception werfen wenn Datei nicht vorhanden
      $data = file_get_contents($data);
      $data = normalizeLN($data, "\n");
      $data = explode("\n", $data);
      foreach($data as $line){
          $myLine = trim($line);
          if(!empty($myLine)){
              $splitted = explode(":", $myLine);
              $country = new Country();
              $country->code = trim($splitted[0]);
              $country->name = trim($splitted[1]);
              if($country->code == $code){
                 $result = $country;
                 break;
              }
          }

      }
      return $result;
  }

  public function getCountryByName($name, $language = null, $folder = "default"){
      $result = null;
      if(!$language){
          $language = getCurrentLanguage(true);
      }
      $file = getModulePath("country_list", true) . "/data/" . $folder. "/" . $language . ".txt";
      // @FIXME: Prüfen ob Datei existiert
      // und Exception werfen wenn Datei nicht vorhanden
      $data = file_get_contents($data);
      $data = normalizeLN($data, "\n");
      $data = explode("\n", $data);
      foreach($data as $line){
          $myLine = trim($line);
          if(!empty($myLine)){
              $splitted = explode(":", $myLine);
              $country = new Country();
              $country->code = trim($splitted[0]);
              $country->name = trim($splitted[1]);
              if($country->name == $name){
                 $result = $name;
                 break;
              }
          }

      }
      return $result;
  }
}
