<?php

namespace SIAPI\JsonCollection;

interface DataContainer
{
    /**
     * @param \SIAPI\JsonCollection\Data
     */
    public function addData(Data $data);

    /**
     * @return array
     */
    public function getData();
} 