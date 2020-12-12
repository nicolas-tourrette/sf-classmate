<?php


namespace App\Controller\Back;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MainBackController
 * @package App\Controller\Back
 * @Route(path="/auth")
 */
class MainBackController extends AbstractController
{
	/**
	 * @Route(path="/", name="back_home")
	 */
	public function index(){
		return $this->render("back/pages/home.html.twig");
	}
}