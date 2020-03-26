<?php
/**
 * Class RouteList.
 *
 * @author: Biplob Hossain <biplob.ice@gmail.com>
 *
 * @license MIT
 */
namespace MyPackage;

use Concrete\Core\Routing\RouteListInterface;
use Concrete\Core\Routing\Router;

class RouteList implements RouteListInterface
{
    public function loadRoutes(Router $router)
    {
//        $router
//            ->post('/my/path', '\MyPackage\Controller\MyController::MyMethod')
//            ->addMiddleware(MyMiddleware::class)
//        ;
    }
}
