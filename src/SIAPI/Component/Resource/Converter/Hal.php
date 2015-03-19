<?php

namespace SIAPI\Component\Resource\Converter;

use SIAPI\Component\Resource\Converter;
use SIAPI\Component\Resource\Linker;
use SIAPI\Component\Search\Result;
use SIAPI\Component\Search\ResultSet;

final class Hal implements Converter
{

    /**
     * @var \SIAPI\Component\Resource\Linker
     */
    private $linker;

    /**
     * @param \SIAPI\Component\Resource\Linker $linker
     */
    public function __construct(Linker $linker)
    {
        $this->linker = $linker;
    }

    /**
     * @param \SIAPI\Component\Search\ResultSet $resultSet
     * @return mixed
     */
    public function getResource(ResultSet $resultSet)
    {

    }
}
