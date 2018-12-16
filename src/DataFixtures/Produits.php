<?php
//generer un jeux de donnees pour la table Produit
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Produit;

class Produits extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=1;$i<=10;$i++) {
        	$produit = new Produit();
        	$produit->setTitle("titre de l'article nem")
        	        ->setContent("<P>contenu de l'article</P>")
        	 		->setImage("http://placehold.it/350*150");


        	$manager->persist($produit);



        	
        }

        $manager->flush();
    }
}
