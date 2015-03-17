<?php

namespace SIAPI\Component\Search\Result;

use SIAPI\Component\Search\Result;

final class Image implements Result
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $target;

    /**
     * @var string
     */
    private $satelliteOf;

    /**
     * @var string
     */
    private $mission;

    /**
     * @var string
     */
    private $spacecraft;

    /**
     * @var string
     */
    private $instrument;

    /**
     * @var string
     */
    private $extra;

    /**
     * @var string
     */
    private $source;

    /**
     * @var array
     */
    private $formats = [];

    /**
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $target
     * @return \SIAPI\Component\Search\Result\Image
     */
    public function withTarget($target)
    {
        $copy = clone $this;
        $copy->target = $target;
        return $copy;
    }

    /**
     * @param $mission
     * @return \SIAPI\Component\Search\Result\Image
     */
    public function withMission($mission)
    {
        $copy = clone $this;
        $copy->mission = $mission;
        return $copy;
    }

    /**
     * @param $spacecraft
     * @return \SIAPI\Component\Search\Result\Image
     */
    public function withSpacecraft($spacecraft)
    {
        $copy = clone $this;
        $copy->spacecraft = $spacecraft;
        return $copy;
    }

    /**
     * @param $instrument
     * @return \SIAPI\Component\Search\Result\Image
     */
    public function withInstrument($instrument)
    {
        $copy = clone $this;
        $copy->instrument = $instrument;
        return $copy;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function getMission()
    {
        return $this->mission;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @return string
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @return array
     */
    public function getFormats()
    {
        return $this->formats;
    }

    /**
     * @param array $formats
     */
   /* public function setFormats($formats)
    {
        foreach ($formats as $format) {
            if (is_array($format)) {
                $format = Hydrator::populate(new Format(), $format);
            }
            $this->addFormat($format);
        }
        $this->formats = $formats;
    }*/

    /**
     * @return string
     */
    public function getInstrument()
    {
        return $this->instrument;
    }

    /**
     * @return string
     */
    public function getSatelliteOf()
    {
        return $this->satelliteOf;
    }

    /**
     * @return string
     */
    public function getSpacecraft()
    {
        return $this->spacecraft;
    }

    /**
     * @param Format $image
     */
    /*public function addFormat(Format $image)
    {
        array_push($this->formats, $image);
    }*/

}
