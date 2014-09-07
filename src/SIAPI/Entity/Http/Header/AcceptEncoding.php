<?php

namespace SIAPI\Entity\Http\Header;

/**
 * Class AcceptEncoding
 * @package SIAPI\Entity\Http\Header
 */
class AcceptEncoding
{
    /**
     * @var string
     */
    public $coding;

    /**
     * @var int
     */
    public $quality = 1;
}
