<?php
/**
 * Created by PhpStorm.
 * User: bootta
 * Date: 14.02.18
 * Time: 12:50
 */

$_SERVER['__DEBUG'] = true;

if($_SERVER['__DEBUG']){
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
}

require_once __DIR__.'/../vendor/autoload.php';

