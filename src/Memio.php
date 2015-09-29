<?php

namespace src;

use Memio\Memio\Config\Build;
use Memio\Model\File;
use Memio\Model\Method;
use Memio\Model\Object;
use Memio\Model\Phpdoc\MethodPhpdoc;
use Memio\Model\Phpdoc\PropertyPhpdoc;
use Memio\Model\Phpdoc\ReturnTag;
use Memio\Model\Phpdoc\VariableTag;
use Memio\Model\Property;

class Memio
{

    public function sample()
    {
        $file = File::make('Memio.php')
            ->setStructure(Object::make('Sample')
                ->addProperty(Property::make('string')
                    ->setPhpdoc(PropertyPhpdoc::make()
                        ->setVariableTag(VariableTag::make('string String'))
                    )
                )
                ->addMethod(
                    Method::make('get')
                    ->setPhpdoc(MethodPhpdoc::make()
                        ->setDescription('Return string.')
                        ->setReturnTag(ReturnTag::make('string'))
                    )
                    ->setBody('return $this->string;')
                )
            );

        // Generate the code and display in the console
        $prettyPrinter = Build::prettyPrinter();
        $generatedCode = $prettyPrinter->generateCode($file);
        file_put_contents('tmp/origin/Memio.php', (string) $generatedCode);
    }
}