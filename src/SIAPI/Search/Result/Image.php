<?php

namespace SIAPI\Search\Result;

use SIAPI\Search\Result;
use SIAPI\Entity\Hydrator;

class Image extends Result
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $author
     */
    public function setSource($author)
    {
        $this->source = $author;
    }

    /**
     * @return string
     */
    public function getMission()
    {
        return $this->mission;
    }

    /**
     * @param string $mission
     */
    public function setMission($mission)
    {
        $this->mission = $mission;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param string $target
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }

    /**
     * @return string
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @param string $extra
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;
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
    public function setFormats($formats)
    {
        foreach ($formats as $format) {
            if (is_array($format)) {
                $format = Hydrator::populate(new Format(), $format);
            }
            $this->addFormat($format);
        }
        $this->formats = $formats;
    }

    /**
     * @return string
     */
    public function getInstrument()
    {
        return $this->instrument;
    }

    /**
     * @param string $instrument
     */
    public function setInstrument($instrument)
    {
        $this->instrument = $instrument;
    }

    /**
     * @return string
     */
    public function getSatelliteOf()
    {
        return $this->satelliteOf;
    }

    /**
     * @param string $satelliteOf
     */
    public function setSatelliteOf($satelliteOf)
    {
        $this->satelliteOf = $satelliteOf;
    }

    /**
     * @return string
     */
    public function getSpacecraft()
    {
        return $this->spacecraft;
    }

    /**
     * @param string $spacecraft
     */
    public function setSpacecraft($spacecraft)
    {
        $this->spacecraft = $spacecraft;
    }

    /**
     * @param Format $image
     */
    public function addFormat(Format $image)
    {
        array_push($this->formats, $image);
    }
}