<?php


namespace App\Controller\Front;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainFrontController extends AbstractController
{
	/**
	 * @Route(path="/", name="front_home")
	 */
	public function index(){
		return $this->render('pages/home.html.twig');
	}
}