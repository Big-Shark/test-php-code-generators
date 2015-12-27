<?php

namespace src;

use PhpParser\BuilderFactory;
use PhpParser\Lexer\Emulative;
use PhpParser\Parser;
use PhpParser\PrettyPrinter;
use PhpParser\Node;
use PhpParser\Error;

class PHPParser
{
    public function sample()
    {
        $factory = new BuilderFactory;
        $node = $factory->class('Sample')
            ->addStmt($factory->property('string')
                ->makeProtected()
                ->setDocComment('/**
                          * @var string String
                          */')
            )
            ->addStmt($factory->method('get')
                ->makePublic()
                ->setDocComment('/**
                          * Return string
                          *
                          * @return string String
                          */')
                ->addStmt(new Node\Stmt\Return_(new Node\Expr\Variable('this->string')))
            )
            ->getNode()
        ;

        $stmts = array($node);
        $prettyPrinter = new PrettyPrinter\Standard();
        $code = $prettyPrinter->prettyPrintFile($stmts);

        file_put_contents('tmp/origin/PHPParser.php', (string) $code);
    }
}