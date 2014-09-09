<?php

namespace SIAPI\Collection\JSON;

use SIAPI\Collection\JsonConvertible;

/**
 * Class Template
 * @package SIAPI\Collection\JSON
 * @docs http://amundsen.com/media-types/collection/format/
 * @docs http://code.ge/media-types/collection-next-json/
 */
class Template extends JsonConvertible
{
    /**
     * @var array
     * @link http://amundsen.com/media-types/collection/format/#arrays-data
     */
    private $data = [];

    /**
     * @var \SIAPI\Collection\JSON\Method
     * @link http://code.ge/media-types/collection-next-json/#object-method
     */
    private $method;

    /**
     * @var \SIAPI\Collection\JSON\Enctype
     * @link http://code.ge/media-types/collection-next-json/#object-enctype
     */
    private $enctype;

    /**
     * @param \SIAPI\Collection\JSON\Data $data
     */
    public function addData(Data $data)
    {
        array_push($this->data, $data);
    }

    /**
     * @param \SIAPI\Collection\JSON\Method $method
     */
    public function setMethod(Method $method)
    {
        $this->method = $method;
    }

    /**
     * @return \SIAPI\Collection\JSON\Method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param \SIAPI\Collection\JSON\Enctype $enctype
     */
    public function setEnctype(Enctype $enctype)
    {
        $this->enctype = $enctype;
    }

    /**
     * @return \SIAPI\Collection\JSON\Enctype
     */
    public function getEnctype()
    {
        return $this->enctype;
    }

    /**
     * {@inheritdoc}
     */
    protected function getObjectData()
    {
        return get_object_vars($this);
    }
}
