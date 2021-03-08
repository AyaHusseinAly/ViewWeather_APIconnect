<?php
require_once('config.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Weather
 *
 * @author webre
 */
class guzzle_Weather implements Weather_Interface {

    //put your code here
    private $url;
    

    public function __construct() {
        $this->url=__APIurl;
       
    }

    public function get_cities() {
        $string= file_get_contents(__CITIES_FILE);
        $jsonArr= json_decode($string,true);
        $cities= array();
        foreach($jsonArr as $jsonObj){
            //echo "<pre>"; print_r( $jsonObj); echo "</pre>";
            $cities[]=$jsonObj['name'];
        }
        return $cities;
    }

    public function get_weather($city) {
        $this->url=str_replace("{{cityid}}",$city,$this->url);
        $client=new \GuzzleHttp\Client();
        $response=$client->get($this->url);
        $fetchedData=json_decode($response->getBody(),true);
        
        echo "<div style='margin:50px'><h3>";
        echo $city." Weather Status";echo "</h3>";
        echo  $fetchedData['weather']['0']["description"].'<br>';
        echo "<img src='http://openweathermap.org/img/wn/". $fetchedData['weather']['0']['icon'].".png'><br>";
        echo "Temperaure= ". $fetchedData['main']['temp'].'<br>';
        echo "Min Temperaure= ". $fetchedData['main']['temp_min'].'<br>';
        echo "Max Temperaure= ". $fetchedData['main']['temp_max'].'<br>';
        echo "Humidity= ". $fetchedData['main']['humidity']."%".'<br>';
        echo "Wind Speed= ". $fetchedData['wind']['speed']."Km/hr".'<br>';
        echo "</div>";
      
    }

    public function get_current_time() {
        echo "<div style='margin:50px'>";
        date_default_timezone_set("Africa/Cairo");
        echo date("h:i:sa").'<br>';
        //echo date("Y-m-d").'<br>';echo "</div>";
        $hr=date("h:i:sa");
        $date=date("Y-m-d");
        echo date('D M Y',strtotime($date)).'<br>';echo "</div>";
        
    }

}
