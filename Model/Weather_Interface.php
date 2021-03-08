<?php
interface Weather_Interface {
    public function get_cities();
    public function get_weather($cityid);
    public function get_current_time();
    
    
}