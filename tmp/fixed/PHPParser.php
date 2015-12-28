<?php

namespace name\space;

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
    public function get()
    {
        return $this->string;
    }
    /**
     * Set string
     *
     * @param string $string String
     * @return $this
     */
    public function set($string)
    {
        $this->string = $string;
        return $this;
    }
}
