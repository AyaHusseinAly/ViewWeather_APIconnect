<?php
interface SMS_Interface {
    public function send_bulk($numbers=array());
    public function send($number);    
    
}


