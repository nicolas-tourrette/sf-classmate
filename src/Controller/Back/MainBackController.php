<?php


namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MainBackController
 * @package App\Controller\Back
 * @Route(path="/{space}", requirements={"space": "teacher|student|admin"})
 */
class MainBackController extends AbstractController
{
	private function getPanelName(string $space): string
	{
		switch ($space) {
			case "admin":
				return "Administration";
			case "teacher":
				return "Enseignant";
			case "student":
				return "Étudiant";
			default:
				return "";
		}
	}
	
	/**
	 * @Route(path="/", name="back_home")
	 * @param string $space
	 * @return Response
	 */
	public function index(string $space): Response
	{
		return $this->render("back/" . $space . "/pages/home.html.twig", array(
			"panel" => $this->getPanelName($space)
		));
	}
}