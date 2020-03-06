<?php

require_once __DIR__ . "/vendor/autoload.php";

$class = new Rozeo\OGP\Ogp("Ogp Test", "article");
var_dump((string)$class);
