<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\type\SubmitType;
use Symfony\Component\Form\Extension\Core\type\PasswordType;
use Symfony\Component\Form\Extension\Core\type\EmailType;
use Symfony\Component\Validator\Constraints\DateTime;

use Symfony\Component\HttpFoundation\Request;

use Ikproj\HomeBundle\Form\eventstype;
//importer la classe ObjectManager
use Doctrine\Common\Persistence\ObjectManager;
//importer les classes Personne et Produit
use App\Entity\Personne;
use App\Entity\Produit;
use App\Entity\Panier;
use App\Entity\User;
//importer PersonneRepository
use App\getRepository\PersonneRepository;

class ProduitsController extends Controller
{
    /**
     * @Route("/produits{id}", name="produits")
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
     * @Route("panier", name="panier")
     */


     public function panier()
    {
        $repopanier=$this->getDoctrine()->getRepository(Panier::class);
        $paniers=$repopanier->findAll();

      $repoproduit=$this->getDoctrine()->getRepository(Produit::class);
        $produits=$repoproduit->findAll();
        

        return $this->render('produits/panier.html.twig', ['controller_name' => 'ProduitsController',
           'paniers'=>$paniers,
           'produits'=>$produits
        ]);
     }


     /**
     * @Route("/produits/{id}", name="afiche")
     */

         public function afiche($id,ObjectManager $manager)
    {
        $repo=$this->getDoctrine()->getRepository(Produit::class);
        $produit=$repo->find($id);

        
       $user = $this->getUser();     
              $panier = new Panier();

            
            $panier->setEmail( $user->getEmail() )
                    ->setIdProduit($id)

                    ->setDateAjout(new \DateTime());


            $manager->persist($panier);


            $manager->flush();

            return $this->render('produits/afiche.html.twig', [
           'produit'=>$produit
        ]);
}
     

    /**
     * @Route("valider", name="valider")
     */


     public function valider()
    {
        return $this->render('produits/valider.html.twig', [
            'controller_name' => 'ProduitsController',
        ]);
    }


    
}
