<?php 
// Interface chung cho thông báo
interface Notification{
    public function send($msg);
}