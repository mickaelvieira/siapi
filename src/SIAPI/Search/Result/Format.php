<?php

namespace SIAPI\Search\Result;

use SIAPI\Search\Result;

class Format extends Result
{
    /**
     * @var string
     */
    private $width;

    /**
     * @var string
     */
    private $height;

    /**
     * @var integer
     */
    private $imageType;

    /**
     * @var string
     */
    private $mimeType;

    /**
     * @var string
     */
    private $size;

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param string $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return int
     */
    public function getImageType()
    {
        return $this->imageType;
    }

    /**
     * @param int $imageType
     */
    public function setImageType($imageType)
    {
        $this->imageType = $imageType;
    }

    /**
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param string $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param string $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }
}