<?php
//require("autoload.php");
require __DIR__ . '/vendor/autoload.php';

ini_set('memory_limit', '-1');

$weather = new guzzle_Weather();
$egyption_cities = $weather->get_cities();


if (isset($_POST['cities'])) {  
    //echo "<pre>"; print_r($_POST ); echo "</pre>";


    $weather->get_current_time();
    $weather->get_weather($_POST['cities']);

  
}


    echo "<div style='margin:50px'><h5>Weather Forecast</h5><form method='post' action='index.php'><select name='cities' id='cities'>";
        //echo "<pre>"; print_r($egyption_cities ); echo "</pre>";
        foreach($egyption_cities as  $city){
           echo" <option value= '$city'>'$city'</option> ";
        } 
    echo "<input type='submit' value='GetWeather'></select></form></div>";
    