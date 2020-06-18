<?php
/**
 *
 * Created by PhpStorm.
 * User: jacky.yao
 * Date: 2020/6/18
 * Time: 23:20
 */

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;


require  __DIR__ . '/vendor/autoload.php';

class Kernel extends BaseKernel
{
    public function registerBundles()
    {
        return [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle()
        ];
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension('framework', [
            'secrect' => 'SOME_SECRECT'
        ]);
    }


    protected function configureRoutes(RoutingConfigurator $routes)
    {
        $routes->add('/random/{limit}','Kernel::randomNumber');
    }

    public function randomNumber($limit)
    {
        return new JsonResponse([
            'number' => random_int(0, $limit),
        ]);
    }

}

$kernel = new Kernel('dev', true);
$request = Request::createFromGlobals();
$response =$kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);

