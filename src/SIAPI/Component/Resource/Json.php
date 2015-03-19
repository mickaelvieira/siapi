<?php

namespace SIAPI\Component\Resource;

use SIAPI\Component\Search\ResultSet;

class Json
{

    /**
     * @var \SIAPI\Component\Search\ResultSet
     */
    private $resultSet;

    /**
     * @var Converter
     */
    private $converter;

    /**
     * @var JsonRenderer
     */
    private $renderer;

    /**
     * @param \SIAPI\Component\Search\ResultSet      $resultSet
     * @param \SIAPI\Component\Resource\Converter    $converter
     * @param \SIAPI\Component\Resource\JsonRenderer $renderer
     */
    public function __construct(ResultSet $resultSet, Converter $converter, JsonRenderer $renderer)
    {
        $this->resultSet = $resultSet;
        $this->converter = $converter;
        $this->renderer  = $renderer;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->renderer->toJson($this->converter->getResource($this->resultSet));
    }
}
