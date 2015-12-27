<?php

namespace src;

use Nette\PhpGenerator\ClassType;

class Nette {

    public function sample()
    {
        $class = new ClassType('Sample');
        $class->addProperty('string')
            ->addComment('@var string String');

        $class->addMethod('get')
            ->addComment('Return string.')
            ->addComment('')
            ->addComment('@return string')
            ->setBody('return $this->?;', ['string']);

        file_put_contents('tmp/origin/Nette.php', '<?php'.PHP_EOL.(string) $class);
    }
}