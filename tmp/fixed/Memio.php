<?php

namespace name\space;

class Sample
{
    /**
     * @var string String
     */
    public $string;

    /**
     * Return string
     *
     * @return string
     */
    public function get()
    {
        return $this->string;
    }

    /**
     * Set string
     *
     * @param string $string String
     *
     * @return $this
     */
    public function set($string)
    {
        $this->string = $string;
        return $this;
    }
}
