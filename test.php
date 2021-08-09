<?php
require_once __DIR__.'/Models/Google.php';
require_once __DIR__.'/Models/Yahoo.php';
require_once __DIR__.'/Models/Bing.php';

$keyword = "Nas";

$g = new Google($keyword);
$y = new Yahoo($keyword);
$b = new Bing($keyword);

echo 'Google'.PHP_EOL;
print_r($g->getLinks());
echo 'Yahoo'.PHP_EOL;
print_r($y->getLinks());
echo 'Bing'.PHP_EOL;
print_r($b->getLinks());