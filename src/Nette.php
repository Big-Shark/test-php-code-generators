<?php

namespace src;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;

class Nette {

    public function sample()
    {
        $file = new PhpFile();
        $class = $file->addClass('name\space\Sample');

        $class->addProperty('string')
            ->addComment('@var string String');

        $class->addMethod('get')
            ->addComment('Return string.')
            ->addComment('')
            ->addComment('@return string')
            ->setBody('return $this->?;', ['string']);

        file_put_contents('tmp/origin/Nette.php', (string) $file);
    }
}