<?php

namespace SIAPI\Resource\JsonCollection\Template;

use SIAPI\JsonCollection\Template;
use SIAPI\Resource\JsonCollection\Template\Data as TemplateData;

class Image extends Template
{
    public function __construct()
    {
        $this->addData(new TemplateData\Mission());
        $this->addData(new TemplateData\Target());
        $this->addData(new TemplateData\Spacecraft());
        $this->addData(new TemplateData\Instrument());
        $this->addData(new TemplateData\Source());
    }
} 