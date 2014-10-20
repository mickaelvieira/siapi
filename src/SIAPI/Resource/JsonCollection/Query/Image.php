<?php

namespace SIAPI\Resource\JsonCollection\Query;

use SIAPI\Resource\JsonCollection\Data;
use SIAPI\Resource\JsonCollection\Query\Data as QueryData;
use SIAPI\JsonCollection\Query;

class Image extends Query
{
    /**
     * {@inheritdoc}
     */
    protected $href = 'search';

    /**
     * {@inheritdoc}
     */
    protected $rel = 'search';

    /**
     * {@inheritdoc}
     */
    protected $name = 'image';

    /**
     * {@inheritdoc}
     */
    protected $prompt = 'Here my prompt Message';


    public function __construct()
    {
        $this->addData(new QueryData\Mission());
        $this->addData(new QueryData\Target());
        $this->addData(new QueryData\Spacecraft());
        $this->addData(new QueryData\Instrument());
        $this->addData(new QueryData\Source());
    }
} 