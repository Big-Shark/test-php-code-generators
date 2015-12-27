<?php

namespace src;

use gossi\codegen\generator\CodeFileGenerator;
use gossi\codegen\model\PhpClass;
use gossi\codegen\model\PhpMethod;
use gossi\codegen\model\PhpProperty;
use gossi\codegen\utils\Writer;
use gossi\docblock\Docblock;
use gossi\docblock\tags\TagFactory;

class Gossi
{

    public function sample()
    {
        $class = new PhpClass('Sample');
        $class->setProperty(PhpProperty::create('string')
            ->setType('string', 'String')
        );

        $writer = new Writer();

        $class->setMethod(PhpMethod::create('get')
            ->setDescription(['Return string'])
            ->setType('string')
            ->setBody($writer->writeln('return $this->string;')->getContent())
        );

        $generator = new CodeFileGenerator();
        $code = $generator->generate($class);

        file_put_contents('tmp/origin/Gossi.php', (string) $code);
    }
}