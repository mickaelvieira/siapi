<?php

namespace SIAPI\Component\Search;

use LogicException;

use SIAPI\Component\Application;
use SIAPI\Component\Search\Repository\ImageRepository;

final class RepositoryFactory
{
    /**
     * @param string $name
     * @param \SIAPI\Component\Application $application
     * @return \SIAPI\Component\Search\Repository\ImageRepository
     */
    public static function make($name, Application $application)
    {
        if ($name === 'image') {
            return new ImageRepository($application);
        } else {
            throw new LogicException(
                sprintf(
                    "%s is not a valid repository name, cannot built repository",
                    $name
                )
            );
        }
    }
}
