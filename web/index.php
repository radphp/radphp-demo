<?php

use Rad\Network\Http\Request;

require __DIR__ . '/../vendor/autoload.php';

Application::getInstance()->handleWeb(new Request());
