<?php

namespace SIAPI\Entity\Input;

/**
 * Class Type
 * @package SIAPI\Entity\Input
 */
final class Type
{
    private function __construct()
    {
    }

    const NUMBER   = "number";
    const EMAIL    = "email";
    const URL      = "url";
    const DATE     = "date";
    const DATETIME = "datetime";
    const MONTH    = "month";
    const TEL      = "tel";
}
