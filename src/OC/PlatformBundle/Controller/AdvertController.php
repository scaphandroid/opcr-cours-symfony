<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
// use Symfony\Component\HttpFoundation\RedirectResponse; //pour faire des redirections

class AdvertController extends Controller
{
	
	//test
	public function indexTestAction(){
		
		$content = $this->get('templating')->render('OCPlatformBundle:Advert:indexTest.html.twig', array('nom' => 'Alexis'));
		
		return new Response($content);	
	}
	
	//test
	public function byeAction(){
		 
		$content = $this->get('templating')->render('OCPlatformBundle:Advert:bye.html.twig');
		
		return new Response($content);
	}
	
	//test avec plusieurs paramètre
	public function viewSlugAction($year, $slug, $_format){
		
		return new Response("Année :".$year." ,slug : "." ,format :".$_format);
	}
	
	/****
	*véritable plateforme
	****/
	
	
	
	public function indexAction($page){
		
		//on ne peut pas avoir d'index de page négatif
		if ($page < 1 ){
			
			//cette exception affiche une page 404 que l'on pourra personnaliser par la suite
			throw new NotFoundHttpException('Page "'.$page.'" inexistante !');		
		}
		
		//TODO provisoire
		$listTest = array(
			array(
				'title'   => 'Recherche développpeur Symfony',
				'id'      => 1,
				'author'  => 'Alexandre',
				'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
				'date'    => new \Datetime()),
			array(
				'title'   => 'Mission de webmaster',
				'id'      => 2,
				'author'  => 'Hugo',
				'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
				'date'    => new \Datetime()),
			array(
				'title'   => 'Offre de stage webdesigner',
				'id'      => 3,
				'author'  => 'Mathieu',
				'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
				'date'    => new \Datetime())
		);
		
		return $this->render('OCPlatformBundle:Advert:index.html.twig', array(
			'listAdverts' => $listTest
		));
	}
	
	public function viewAction($id){
		
		//TODO provisoire
		$listTest = array(
			array(
				'title'   => 'Recherche développpeur Symfony',
				'id'      => 1,
				'author'  => 'Alexandre',
				'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
				'date'    => new \Datetime()),
			array(
				'title'   => 'Mission de webmaster',
				'id'      => 2,
				'author'  => 'Hugo',
				'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
				'date'    => new \Datetime()),
			array(
				'title'   => 'Offre de stage webdesigner',
				'id'      => 3,
				'author'  => 'Mathieu',
				'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
				'date'    => new \Datetime())
		);
	
		return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
			'advert' => $listTest[$id-1]
		));
				
	}
	
	public function addAction( Request $request){
		
		//si on envoie un formulaire la requête est en POST :
		
		//TODO provisoire
		if ($request->isMethod('POST')) {
			
			//création et gestion du formulaire à faire
			
			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée');
			
			//retour vers la page de visualisation de l'annonce créée
			return $this->redirectToRoute('oc_platform_view', array(
				'id' => 5
			));
		}
		
		//si la requête n'est pas en POST on affiche le formulaire
		return $this->render('OCPlatformBundle:Advert:add.html.twig');
	}
	
	public function editAction($id, Request $request){
		
		//même logique que pour le add
		
		
		if ($request->isMethod('POST')) {
			
			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée');
			
			//retour vers la page de visualisation de l'annonce modifiée
			return $this->redirectToRoute('oc_platform_view', array(
				'id' => 5
			));
		}
		
		$listTest = array(
			array(
				'title'   => 'Recherche développpeur Symfony',
				'id'      => 1,
				'author'  => 'Alexandre',
				'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
				'date'    => new \Datetime()),
			array(
				'title'   => 'Mission de webmaster',
				'id'      => 2,
				'author'  => 'Hugo',
				'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
				'date'    => new \Datetime()),
			array(
				'title'   => 'Offre de stage webdesigner',
				'id'      => 3,
				'author'  => 'Mathieu',
				'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
				'date'    => new \Datetime())
		);
		
		return $this->render('OCPlatformBundle:Advert:edit.html.twig', array(
			'advert' => $listTest[$id-1]
		));
	}
	
	public function deleteAction($id) {
		
		//ici on fera la suppression de l'annonce id
		
		return $this->render('OCPlatformBundle:Advert:delete.html.twig');
	}
	
	public function menuAction($limit){
		
		$listTest = array(
			array(
				'title'   => 'Recherche développpeur Symfony',
				'id'      => 1,
				'author'  => 'Alexandre',
				'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
				'date'    => new \Datetime()),
			array(
				'title'   => 'Mission de webmaster',
				'id'      => 2,
				'author'  => 'Hugo',
				'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
				'date'    => new \Datetime()),
			array(
				'title'   => 'Offre de stage webdesigner',
				'id'      => 3,
				'author'  => 'Mathieu',
				'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
				'date'    => new \Datetime())
		);
		
		return $this->render('OCPlatformBundle:Advert:menu.html.twig', array(
			'listAdverts' => $listTest
		));
	}
}