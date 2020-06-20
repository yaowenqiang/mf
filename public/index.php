<?php
/**
 *
 * Created by PhpStorm.
 * User: jacky.yao
 * Date: 2020/6/18
 * Time: 23:20
 */

use App\Kernel;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


$loader = require  __DIR__ . '../vendor/autoload.php';

AnnotationRegistry::registerLoader([$loader, 'loadClass']);

$kernel = new Kernel('dev', true);
$request = Request::createFromGlobals();
$response =$kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);

