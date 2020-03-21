<?php

 /** 
 * 
 * Code example; for more informatio see:
 * https://oneguyoneblog.com/2020/03/19/covid-19-corona-get-data-with-php/
 * 
 * 
 **/

 $url = "https://api.kawalcorona.com/indonesia/";
 
 $client = curl_init($url);
 curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
 $response = curl_exec($client);
 
 $result = json_decode($response);


 $Confirmed = $result[0]->positif;
 
 $Deaths = $result[0]->meninggal;
 
 $Recovered = $result[0]->sembuh;
 

 $datetimeString = $result[1]->lastupdate;
 $Last_Update = date("l d F Y, H:i:s", strtotime($datetimeString));


 echo "Confirmed: ".$Confirmed;
 echo "<br>";
 echo "Deaths: ".$Deaths;
 echo "<br>";
 echo "Recovered: ".$Recovered;
 echo "<br>";
 echo "Last Update: ".$Last_Update;

?>