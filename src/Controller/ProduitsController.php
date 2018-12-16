<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\type\SubmitType;
use Symfony\Component\Form\Extension\Core\type\PasswordType;
use Symfony\Component\Form\Extension\Core\type\EmailType;

use Symfony\Component\HttpFoundation\Request;

use Ikproj\HomeBundle\Form\eventstype;
//importer la classe ObjectManager
use Doctrine\Common\Persistence\ObjectManager;
//importer les classes Personne et Produit
use App\Entity\Personne;
use App\Entity\Produit;
//importer PersonneRepository
use App\getRepository\PersonneRepository;

class ProduitsController extends Controller
{
    /**
     * @Route("/produits", name="produits")
     */
    public function index()
    {
        return $this->render('produits/index.html.twig', [
            'controller_name' => 'ProduitsController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */


     public function home()
    {
        return $this->render('produits/home.html.twig', [
            'controller_name' => 'ProduitsController',
        ]);
    }

    /**
     * @Route("produit", name="produit")
     */


     public function produit()
    {
    	$repo= $this->getDoctrine()->getRepository(Produit::class);
        //recuperer tout les enrgistrements de la table Produit
    	$produits=$repo->findAll();
        return $this->render('produits/produit.html.twig', [
            'controller_name' => 'ProduitsController',
            'produits'=>$produits
        ]);
    }

    /**
     * @Route("panier/{id}", name="panier")
     */


     public function panier($id)
    {
        $repo=$this->getDoctrine()->getRepository(produit::class);
        $produits=$repo->find($id);


        //ajouter un article a la table panier 

        //ajouter la personne a la table panier
        //ajouter une date
        // 'produits'=>$produits

        return $this->render('produits/panier.html.twig', [
           'produits'=>$produits
        ]);
    }

     

    


    
}
