<?php

namespace SIAPI\Component\JsonCollection;

interface DataContainer
{
    /**
     * @param \SIAPI\Component\JsonCollection\Data
     */
    public function addData(Data $data);

    /**
     * @return array
     */
    public function getData();
} 