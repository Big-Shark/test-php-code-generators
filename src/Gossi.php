<?php

namespace src;

use gossi\docblock\Docblock;
use gossi\docblock\tags\TagFactory;

class Gossi
{

    public function sample()
    {
        $class = new \gossi\codegen\model\PhpClass('Sample');
        $class->setProperty(\gossi\codegen\model\PhpProperty::create('string')
            ->setType('string')
            ->setDescription('String')
        );

        $class->setMethod(\gossi\codegen\model\PhpMethod::create('get')
            ->setDescription(['Return string', '', '@return string'])
            ->setBody('return $this->string;')
        );

        $generator = new \gossi\codegen\generator\CodeGenerator();
        $code = $generator->generate($class);

        file_put_contents('tmp/Gossi.php', '<?php'.PHP_EOL.(string) $code);
    }
}