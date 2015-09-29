<?php

namespace src;

class Gossi
{

    public function sample()
    {
        $class = new \gossi\codegen\model\PhpClass('Sample');
        $class->setProperty(\gossi\codegen\model\PhpProperty::create('string')
            ->setType('string', 'String')
        );

        $class->setMethod(\gossi\codegen\model\PhpMethod::create('get')
            ->setDescription(['Return string'])
            ->setType('string')
            ->setBody('return $this->string;')
        );

        $generator = new \gossi\codegen\generator\CodeGenerator();
        $code = $generator->generate($class);

        file_put_contents('tmp/origin/Gossi.php', '<?php'.PHP_EOL.(string) $code);
    }
}