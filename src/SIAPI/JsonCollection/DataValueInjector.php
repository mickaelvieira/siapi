<?php
/**
 * Created by PhpStorm.
 * User: mickael
 * Date: 11/10/14
 * Time: 07:00
 */

namespace SIAPI\JsonCollection;


class DataValueInjector
{
    /**
     * @param DataContainer $object
     * @param $values
     * @return DataContainer
     */
    public static function injectValues(DataContainer $object, $values)
    {
        foreach ($values as $name => $value) {
            foreach ($object->getData() as $data) {
                /** @var \SIAPI\JsonCollection\Data $data */
                if ($data->getName() === $name) {
                    $data->setValue($value);
                    break;
                }
            }
        }
        return $object;
    }
} 