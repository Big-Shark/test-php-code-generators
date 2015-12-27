<?php

include_once __DIR__.'/vendor/autoload.php';

$nette = new src\Nette();
$nette->sample();

$memio = new src\Memio();
$memio->sample();

$PHPParser = new src\PHPParser();
$PHPParser->sample();

$gossi = new src\Gossi();
$gossi->sample();

$originDir = __DIR__.'/tmp/origin/';
$fixedDir  = __DIR__.'/tmp/fixed/';
$files = array_diff(scandir($originDir), array('..', '.'));
foreach ($files as $file) {
    copy($originDir.$file, $fixedDir.$file);
}

echo exec('php-cs-fixer fix tmp/fixed --rules=@PSR2', $output);
//var_dump($output);