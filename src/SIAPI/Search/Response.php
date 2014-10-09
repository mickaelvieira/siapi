<?php

namespace SIAPI\Search;

interface Response
{
    /**
     * @return int
     */
    public function getTotal();

    /**
     * @return \Traversable
     */
    public function getResultSet();
} 