<?php
/**
 *
 * Created by PhpStorm.
 * User: jacky.yao
 * Date: 2020/6/19
 * Time: 23:40
 */


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class MicroController extends AbstractController
{
    /**
     * @Route("/random/{limit}")
     */
    public function randomNumber(LoggerInterface $logger)
    {
        $logger->info('this is an info log');
        $logger->error('this is an error log');
        $logger->critical('this is a critical log', [
            'cause' => 'in_hurry'
        ]);
        $limit = 100;
        $number = random_int(0, $limit);
        return $this->render('micro/random.html.twig', [
            'number' => $number
        ]);
    }
}