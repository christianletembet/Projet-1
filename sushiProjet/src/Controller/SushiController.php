<?php

namespace App\Controller;

use App\Entity\Livreur;
use App\Repository\LivreurRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/administration", name="administration")
     */
    public function administration(Request $request,ObjectManager $manager)

    {
        $livreur = new Livreur();
        $formLivreur = $this ->createFormBuilder($livreur)
            ->add('nom')
            ->add('prenom')
            ->add('email',EmailType::class)
            ->add('telephone')
            ->add('nombreLivraisons')
            ->add('tempsLivraison')
            ->add('absences')
            ->add('etatCommande')
            ->add('save',SubmitType::class,[
                'label'=>'Enregistrer'
            ])
            ->getForm();


        return $this->render('sushi/administration.html.twig',['formLivreur' =>$formLivreur->createView()]);
    }

}


