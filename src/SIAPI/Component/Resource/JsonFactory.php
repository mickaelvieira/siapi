<?php

namespace SIAPI\Component\Resource;

use SIAPI\Component\Application;
use SIAPI\Component\Search\ResultSet;

final class JsonFactory
{

    /**
     * @param \SIAPI\Component\Application      $application
     * @param \SIAPI\Component\Search\ResultSet $resultSet
     * @param \SIAPI\Component\Resource\Linker  $linker
     * @return \SIAPI\Component\Resource\Json
     */
    public static function makeJsonCollection(Application $application, ResultSet $resultSet, Linker $linker)
    {
        return new Json(
            $resultSet,
            new Converter\JsonCollection($application, $linker),
            new Renderer\JsonCollection()
        );
    }

    /**
     * @param \SIAPI\Component\Search\ResultSet $resultSet
     * @param \SIAPI\Component\Resource\Linker  $linker
     * @return \SIAPI\Component\Resource\Json
     */
    public static function makeHal(ResultSet $resultSet, Linker $linker)
    {
        return new Json($resultSet, new Converter\Hal($linker), new Renderer\Hal());
    }
}
