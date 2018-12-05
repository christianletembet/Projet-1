<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SushiController extends AbstractController
{
    /**
     * @Route("/", name="sushi")
     */
    public function index()
    {
        return $this->render('sushi/index.html.twig', [
            'controller_name' => 'SushiController',
        ]);
    }
}
