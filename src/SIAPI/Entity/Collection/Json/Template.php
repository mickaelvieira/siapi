<?php

namespace SIAPI\Entity\Collection\Json;

use JsonSerializable;

/**
 * Class Template
 * @package SIAPI\Entity\Collection\Json
 * @docs http://amundsen.com/media-types/collection/format/
 */
class Template implements JsonSerializable
{
    /**
     * @var array
     */
    private $data = array();

    /**
     * @var \SIAPI\Entity\Collection\Json\Method
     * @docs http://code.ge/media-types/collection-next-json/
     */
    private $method;

    /**
     * @var \SIAPI\Entity\Collection\Json\Enctype
     * @docs http://code.ge/media-types/collection-next-json/
     */
    private $enctype;

    /**
     * @param \SIAPI\Entity\Collection\Json\Data $data
     */
    public function addData(Data $data)
    {
        array_push($this->data, $data);
    }

    /**
     * @param \SIAPI\Entity\Collection\Json\Method $method
     */
    public function setMethod(Method $method)
    {
        $this->method = $method;
    }

    /**
     * @return \SIAPI\Entity\Collection\Json\Method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param \SIAPI\Entity\Collection\Json\Enctype $enctype
     */
    public function setEnctype(Enctype $enctype)
    {
        $this->enctype = $enctype;
    }

    /**
     * @return \SIAPI\Entity\Collection\Json\Enctype
     */
    public function getEnctype()
    {
        return $this->enctype;
    }

    /**
     * @return mixed|void
     */
    public function jsonSerialize()
    {
        // @TODO need to write the logic here
    }
}
