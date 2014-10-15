<?php

namespace SIAPI\PhpSpec;

use PhpSpec\Exception\Exception;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Prophecy\Prophet;

class JsonSerializableBehavior extends ObjectBehavior
{
    const FIXTURES_DIR = 'spec/fixtures/';

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

    /**
     * @return \Prophecy\Prophet
     */
    protected function getProphet()
    {
        return new Prophet();
    }

    private function getJson($subject)
    {
        return json_encode($subject, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    private function dumpValue($returned, $expected)
    {
        $message = sprintf("%s expected to be equal to %s but it is not.", $returned, $expected);
        throw new Exception($message);
    }

    protected function getJsonFixtureContent($filename)
    {
        $json = $this->getFixtureContent($filename);
        $json = json_decode($json);
        $json = json_encode($json, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return $json;
    }

    protected function getFixtureContent($filename)
    {
        $filePath = realpath(self::FIXTURES_DIR . $filename);

        if (!$filePath) {
            throw new Exception(
                sprintf(
                    "Unable to file find file %s in dir %",
                    $filename,
                    self::FIXTURES_DIR
                )
            );
        }

        return file_get_contents($filePath);
    }
}
