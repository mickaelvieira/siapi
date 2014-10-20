<?php

namespace SIAPI\Component\JsonCollection;

use SIAPI\Component\JsonCollection;

/**
 * Class Template
 * @package SIAPI\Component\JsonJsonCollection
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 */
class Template extends JsonConvertible implements DataContainer
{
    /**
     * @var array
     * @link http://amundsen.com/media-types/collection/format/#arrays-data
     */
    private $data = [];

    /**
     * @var \SIAPI\Component\JsonCollection\Method
     * @link http://code.ge/media-types/collection-next-json/#object-method
     */
    protected $method;

    /**
     * @var \SIAPI\Component\JsonCollection\Enctype
     * @link http://code.ge/media-types/collection-next-json/#object-enctype
     */
    protected $enctype;

    /**
     * @param \SIAPI\Component\JsonCollection\Data $data
     */
    public function addData(Data $data)
    {
        array_push($this->data, $data);
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \SIAPI\Component\JsonCollection\Method $method
     */
    public function setMethod(Method $method)
    {
        $this->method = $method;
    }

    /**
     * @return \SIAPI\Component\JsonCollection\Method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param \SIAPI\Component\JsonCollection\Enctype $enctype
     */
    public function setEnctype(Enctype $enctype)
    {
        $this->enctype = $enctype;
    }

    /**
     * @return \SIAPI\Component\JsonCollection\Enctype
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
        $data = get_object_vars($this);
        return array_filter(
            $data,
            function ($value) {
                if (is_array($value)) {
                    return !empty($value);
                }
                return !is_null($value);
            }
        );
    }
}
