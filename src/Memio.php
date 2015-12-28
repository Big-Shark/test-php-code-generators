<?php

namespace src;

use Memio\Memio\Config\Build;
use Memio\Model\Argument;
use Memio\Model\File;
use Memio\Model\Method;
use Memio\Model\Object;
use Memio\Model\Phpdoc\Description;
use Memio\Model\Phpdoc\MethodPhpdoc;
use Memio\Model\Phpdoc\ParameterTag;
use Memio\Model\Phpdoc\PropertyPhpdoc;
use Memio\Model\Phpdoc\ReturnTag;
use Memio\Model\Phpdoc\VariableTag;
use Memio\Model\Property;

class Memio
{

    public function sample()
    {
        $file = File::make('Memio.php')
            ->setStructure(Object::make('name\space\Sample')
                ->addProperty(Property::make('string')
                    ->makePublic()
                    ->setPhpdoc(PropertyPhpdoc::make()
                        ->setVariableTag(VariableTag::make('string String'))
                    )
                )
                ->addMethod(
                    Method::make('get')
                    ->setPhpdoc(MethodPhpdoc::make()
                        ->setDescription(Description::make('Return string'))
                        ->setReturnTag(ReturnTag::make('string'))
                    )
                    ->setBody('return $this->string;')
                )
                ->addMethod(
                    Method::make('set')
                        ->setPhpdoc(MethodPhpdoc::make()
                            ->setDescription(Description::make('Set string'))
                            ->addParameterTag(ParameterTag::make('string', 'string', 'String'))
                            ->setReturnTag(ReturnTag::make('$this'))
                        )
                        ->addArgument(Argument::make('string', 'string'))
                        ->setBody('$this->string = $string;'.PHP_EOL.'return $this;')
                )
            );

        // Generate the code and display in the console
        $prettyPrinter = Build::prettyPrinter();
        $generatedCode = $prettyPrinter->generateCode($file);
        file_put_contents('tmp/origin/Memio.php', (string) $generatedCode);
    }
}