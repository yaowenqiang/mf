<?php
/**
 *
 * Created by PhpStorm.
 * User: jacky.yao
 * Date: 2020/6/19
 * Time: 23:31
 */

namespace App;


use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

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
