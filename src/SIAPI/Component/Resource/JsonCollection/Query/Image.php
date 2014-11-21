<?php

namespace SIAPI\Component\Resource\JsonCollection\Query;

use SIAPI\Component\Resource\JsonCollection\Data;
use SIAPI\Component\Resource\JsonCollection\Query\Data as QueryData;
use CollectionNextJson\Entity\Query;

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
    protected $prompt = 'Search';


    public function __construct()
    {
        $this->addData(new QueryData\Mission());
        $this->addData(new QueryData\Target());
        $this->addData(new QueryData\Spacecraft());
        $this->addData(new QueryData\Instrument());
        $this->addData(new QueryData\Source());
        $this->addData(new QueryData\Size());
    }

    /**
     * @param string $name
     * @param array $values
     */
    public function setValueToQueryParameters($name, array $values)
    {
        /** @var \CollectionNextJson\Entity\Data $data */
        $data = $this->getDataByName($name);
        if ($data) {
            $data->addOptionsToList($values);
        }
    }
}
