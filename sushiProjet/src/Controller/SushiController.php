<?php

namespace App\Controller;

use App\Repository\LivreurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SushiController extends AbstractController
{

    /**
     * @Route("/", name="sushi")
     */
    public function index()
    {
        return $this->render('sushi/index.html.twig');
    }

    /**
     * @Route("/livreurs", name="livreurs")
     */
    public function livreurs(LivreurRepository $repository)
    {
        $livreurs=$repository->findAll();
        return $this->render('sushi/livreurs.html.twig',['livreurs'=>$livreurs]);
    }

    /**
     * @Route("/classement", name="classement")
     */
    public function classement(LivreurRepository $repository)
    {
        $livreurs=$repository->findAll();
        return $this->render('sushi/classement.html.twig',['livreurs'=>$livreurs]);
    }
}


