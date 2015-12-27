<?php

class Sample
{
    /**
     * @var string String
     */
    protected $string;
    /**
     * Return string
     *
     * @return string String
     */
    public function &get()
    {
        return $this->string;
    }
}