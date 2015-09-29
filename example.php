<?php

include_once __DIR__.'/vendor/autoload.php';

$nette = new src\Nette();
$nette->sample();

$memio = new src\Memio();
$memio->sample();

$gossi = new src\Gossi();
$gossi->sample();

$originDir = __DIR__.'/tmp/origin/';
$fixedDir  = __DIR__.'/tmp/fixed/';
$files = array_diff(scandir($originDir), array('..', '.'));
foreach ($files as $file) {
    copy($originDir.$file, $fixedDir.$file);
}

exec('php-cs-fixer fix tmp/fixed --level=psr2');