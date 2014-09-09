<?php

namespace SIAPI\Http\Request\Header;

/**
 * Class AcceptBase
 * @package SIAPI\Http\Request\Header
 */
class AcceptBase
{
    /**
     * @var float
     */
    protected $quality = 1.0;

    /**
     * @return float
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @param $pieces
     */
    protected function addParams(array $pieces)
    {
        foreach ($pieces as $piece) {

            $param = explode("=", $piece);

            if (count($param) === 2) {
                if ($param[0] === 'q') {
                    $this->quality = $param[1];
                }
            }
        }
    }
}
