<?php

require_once 'diffbot.class.php';


$d = new diffbot("80e311182327c583cbf654f198086e8a");

$c= $d->analyze("http://mymagic.my" );

var_dump($c);
