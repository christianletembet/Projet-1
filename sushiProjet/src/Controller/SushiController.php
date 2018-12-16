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
        $viewdata['livreurs']=$repository->findAll();
        $viewdata['classementEfficacity']=$repository->findAllOrderedByEfficacity();
        $viewdata['classementRapidity']=$repository->findAllOrderedByRapdity();
        $viewdata['classementPonctuality']=$repository->findAllOrderedByPonctuality();
        $viewdata['classementSoigneux']=$repository-> findAllOrderedBySoigneux();




        return $this->render('sushi/classement.html.twig',$viewdata);
    }

    /**
     * @Route("/administration", name="administration")
     *
     */
    public function administration()

    {
        return $this->render('sushi/administration.html.twig');
    }

    /**
     * @Route("/administration/ajouter", name="ajouter")
     */
    public function formulaire(Request $request,ObjectManager $manager)

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
            ->getForm();

        $formLivreur->handleRequest($request);

        if($formLivreur->isSubmitted()&& $formLivreur->isValid()){
            $manager->persist($livreur);
            $manager->flush();

            return $this->redirectToRoute('livreurs');
        }

        return $this->render('sushi/ajouter.html.twig',['formLivreur' =>$formLivreur->createView()]);
    }

    /**
     * @Route("/administration/modifier", name="modifier")
     *
     */
    public function modifier(LivreurRepository $repository)

    {
        $livreurs=$repository->findAll();
        return $this->render('sushi/modifier.html.twig',['livreurs'=>$livreurs]);
    }

    /**
     * @Route("/administration/modifier/{id}", name="modifieride")
     *
     */
    public function modifierID(Livreur $livreur,Request $request,ObjectManager $manager)

    {
        $formLivreur = $this ->createFormBuilder($livreur)
            ->add('nom')
            ->add('prenom')
            ->add('email',EmailType::class)
            ->add('telephone')
            ->add('nombreLivraisons')
            ->add('tempsLivraison')
            ->add('absences')
            ->add('etatCommande')
            ->getForm();

        $formLivreur->handleRequest($request);

        if($formLivreur->isSubmitted()&& $formLivreur->isValid()){
            $manager->persist($livreur);
            $manager->flush();

            return $this->redirectToRoute('livreurs');
        }

        return $this->render('sushi/modifieride.html.twig',['formLivreur' =>$formLivreur->createView()]);
    }


    /**
     * @Route("/administration/modifier/delete/{id}", name="deleteide")
     *
     */

    public function delete(Livreur $livreur, LivreurRepository $repository){

        $em = $this->getDoctrine()->getManager();
        $em->remove($livreur);
        $em->flush();

        $livreurs=$repository->findAll();
        return $this->render('sushi/modifier.html.twig',['livreurs'=>$livreurs]);
    }



}




