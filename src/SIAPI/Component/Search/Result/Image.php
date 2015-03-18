<?php

namespace SIAPI\Component\Search\Result;

use SIAPI\Component\Search\Result;

final class Image implements Result, \Countable, \IteratorAggregate
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
     * @param \SIAPI\Component\Search\Result\Format $format
     * @return \SIAPI\Component\Search\Result\Image
     */
    public function withFormat(Format $format)
    {
        $copy = clone $this;
        $copy->addFormat($format);
        return $copy;
    }

    /**
     * @param \SIAPI\Component\Search\Result\Format $format
     */
    private function addFormat(Format $format)
    {
        array_push($this->formats, $format);
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
     * @return int
     */
    public function count()
    {
        return count($this->formats);
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->formats);
    }
}
