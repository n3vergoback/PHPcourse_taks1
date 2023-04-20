<?php
require_once 'config/config.php';
require_once 'helpers/redirect_helper.php';

session_start();

spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});