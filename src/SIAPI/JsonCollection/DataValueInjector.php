<?php

namespace SIAPI\JsonCollection;

use SIAPI\Entity\Hydrator;

class DataValueInjector
{
    /**
     * @param DataContainer $object
     * @param $values
     * @return DataContainer
     */
    public static function injectDataValues(DataContainer $object, $values)
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

    /**
     * @param DataContainer $object
     * @param $values
     */
    public static function injectData(DataContainer $object, $values)
    {
        foreach ($object->getConfigData() as $config) {
            $name = $config['name'];
            if (array_key_exists($name, $values)) {
                $config['value'] = $values[$name];
                $object->addData(Hydrator::populate(new Data(), $config));
            }
        }
    }
} 