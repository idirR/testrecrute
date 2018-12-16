<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;


class SecuriteController extends Controller
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request,ObjectManager $manager, UserPasswordEncoderInterface$encoder){
    	//instansier la classe utilisateur
    	$user = new User();
    	//initialiser un formulaire symfony 
    	$form = $this->createForm(RegistrationType::class,$user);

    	$form->handleRequest($request);
    	//verifier l'action formulaire et que les informations sont valide

    	if($form->isSubmitted() && $form->isValid()){
         //verifier que les deux mots de passe sont les meme
          $hash=$encoder->encodePassword($user,$user->getPassword());
          //recuperer le hashe du mot de passe 
          $user->setPassword($hash);
          //faire persister dans le temps le user

    		$manager->persist($user);
    		//inserer dans la table user le user
    		$manager->flush();

    		return $this->redirectToRoute('security_login');


    	}



    	return $this->render('securite/registration.html.twig',['form'=>$form->createView()
    ]);


    }
    /**
     * @Route("securite/login", name="security_login")
     */

    public function login(){
    	//faire appel a la page de connexion

    	return $this ->render('securite/login.html.twig');
    }

      
    }
