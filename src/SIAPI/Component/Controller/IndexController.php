<?php

namespace SIAPI\Component\Controller;


class IndexController
{

    public function indexAction()
    {
        return file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/index.html");
    }
} 