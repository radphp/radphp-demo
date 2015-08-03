<?php

namespace App;

use Rad\Config;
use Rad\Core\Bundle;
use Rad\Routing\Middleware\DispatcherMiddleware;
use Rad\Routing\Middleware\RouterMiddleware;
use Rad\Routing\MiddlewareCollection;
use Twig\Library\Helper as TwigHelper;

/**
 * App Bootstrap
 *
 * @package App
 */
class Bootstrap extends Bundle
{
    /**
     * Startup bundle
     */
    public function startup()
    {
        parent::startup();

        TwigHelper::addMasterTwig('@App/master.twig');

        if ('cli' !== PHP_SAPI) {
            MiddlewareCollection::getInstance()->add(new RouterMiddleware());
            MiddlewareCollection::getInstance()->add(new DispatcherMiddleware());
        }
    }
}
