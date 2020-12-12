<?php


namespace App\Controller\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
	/**
	 * @Route(name="security_login", path="/login")
	 */
	public function login() {
		return $this->render("security/login.html.twig");
	}
}