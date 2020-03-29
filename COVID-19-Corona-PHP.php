<?php

 /** 
 * 
 * Code example; for more information see:
 * https://oneguyoneblog.com/2020/03/19/covid-19-corona-get-data-with-php/
 * 
 * 
 **/

 $url = "https://services1.arcgis.com/0MSEUqKaxRlEPj5g/arcgis/rest/services/Coronavirus_2019_nCoV_Cases/FeatureServer/1/query?where=UPPER(Country_Region)%20like%20%27%25INDONESIA%25%27&outFields=Last_Update,Recovered,Deaths,Confirmed&returnGeometry=false&outSR=4326&f=json";
 
 $client = curl_init($url);
 curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
 $response = curl_exec($client);
 
 $result = json_decode($response);
 

 $Confirmed = $result->features[0]->attributes->Confirmed;
 
 $Deaths = $result->features[0]->attributes->Deaths;
 
 $Recovered = $result->features[0]->attributes->Recovered;
 

 $unix_timestamp = $result->features[0]->attributes->Last_Update;
 $Last_Update = date("l d F Y, H:i:s", substr($unix_timestamp, 0, 10)); // 13 digit epoch time to date conversion


 echo "Confirmed: ".$Confirmed;
 echo "<br>";
 echo "Deaths: ".$Deaths;
 echo "<br>";
 echo "Recovered: ".$Recovered;
 echo "<br>";
 echo "Last Update: ".$Last_Update;

?>
