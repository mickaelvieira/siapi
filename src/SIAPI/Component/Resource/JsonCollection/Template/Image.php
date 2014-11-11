<?php

namespace SIAPI\Component\Resource\JsonCollection\Template;

use JsonCollection\Template;
use SIAPI\Component\Resource\JsonCollection\Template\Data as TemplateData;

class Image extends Template
{
    public function __construct()
    {
        $this->addData(new TemplateData\Mission());
        $this->addData(new TemplateData\Target());
        $this->addData(new TemplateData\Spacecraft());
        $this->addData(new TemplateData\Instrument());
        $this->addData(new TemplateData\Source());
        $this->addData(new TemplateData\Size());
    }
} 