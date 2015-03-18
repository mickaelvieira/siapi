<?php

namespace SIAPI\Component\Search\Result;

use SIAPI\Component\Search\Result;

final class Format
{

    /**
     * @var string
     */
    private $fileName;

    /**
     * @param $fileName
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }
}
