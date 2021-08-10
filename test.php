<?php
require_once __DIR__.'/Models/SearchEngines/Google.php';
require_once __DIR__.'/Models/SearchEngines/Yahoo.php';
require_once __DIR__.'/Models/SearchEngines/Bing.php';
require_once __DIR__.'/Models/Comparison.php';

$keyword = "Nas";

$g = new Google($keyword);
$y = new Yahoo($keyword);
$b = new Bing($keyword);

$glinks = $g->getLinks();
$ylinks = $y->getLinks();
$blinks = $b->getLinks();

new Comparison($glinks, $ylinks, $blinks);

echo 'Google'.PHP_EOL;
print_r($glinks);
echo 'Yahoo'.PHP_EOL;
print_r($ylinks);
echo 'Bing'.PHP_EOL;
print_r($blinks);
