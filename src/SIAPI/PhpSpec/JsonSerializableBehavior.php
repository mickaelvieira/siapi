<?php

namespace SIAPI\PhpSpec;

use PhpSpec\Exception\Exception;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class JsonSerializableBehavior extends ObjectBehavior
{
    /**
     * {@inheritdoc}
     */
    public function getMatchers()
    {
        return [
            'beEqualToJson' => function ($subject, $expected) {
                $json = $this->getJson($subject);
                if (!($json === $expected)) {
                    $this->dumpValue($json, $expected);
                }
                return $json === $expected;
            },
            'haveDataWithName' => function($allData, $name) {
                $filtered = array_filter($allData, function ($data) use ($name) {
                    return $data->getName() === $name;
                });
                return (count($filtered) > 0);
            }
        ];
    }

    private function getJson($subject)
    {
        return json_encode($subject, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    private function dumpValue($returned, $expected)
    {
        $message = sprintf("%s expected to be equal to %s, but it is not.", $returned, $expected);
        throw new Exception($message);
    }
} 