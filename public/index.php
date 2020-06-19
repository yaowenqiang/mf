<?php
/**
 *
 * Created by PhpStorm.
 * User: jacky.yao
 * Date: 2020/6/18
 * Time: 23:20
 */

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


require  __DIR__ . '../vendor/autoload.php';


$kernel = new Kernel('dev', true);
$request = Request::createFromGlobals();
$response =$kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);

