<?php

namespace SIAPI\JsonCollection\Type;


final class Media
{
    /**
     *
     */
    private function __construct()
    {
    }

    const TIFF                 = "image/tiff";
    const JPEG                 = "image/jpeg";
    const COLLECTION_JSON      = "application/vnd.collection+json";
    const COLLECTION_NEXT_JSON = "application/vnd.collection.next+json";
}