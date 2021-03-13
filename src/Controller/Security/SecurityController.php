<?php


namespace App\Controller\Security;

use App\Service\ServiceCompass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
	/**
	 * @Route(name="security_login", path="/login")
	 * @param Request $request
	 * @param AuthenticationUtils $authenticationUtils
	 * @return Response
	 */
	public function login(Request $request, AuthenticationUtils $authenticationUtils): Response
	{
		$lastUsername = $authenticationUtils->getLastUsername();
		$error = $authenticationUtils->getLastAuthenticationError();
		
		// Si le visiteur est déjà identifié, on le redirige vers l'accueil de son backoffice
		if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED') && $referer = $request->headers->get('referer') == null) {
			$compass = new ServiceCompass();
			return $this->redirectToRoute('back_home', array(
				"space" => $compass->getUserBackoffice($this->getUser())
			));
		}
		
		return $this->render("security/login.html.twig", array(
			'last_username' => $lastUsername,
			'error' => $error
		));
	}
	
	/**
	 * @Route("/logout", name="security_logout")
	 */
	public function logout()
	{
	}
	
	/**
	 * @Route("/auth", name="security_auth")
	 */
	public function auth(): RedirectResponse
	{
		$compass = new ServiceCompass();
		$space = $compass->getUserBackoffice($this->getUser());
		
		$this->get('session')->getFlashBag()->set('403', "Il semblerait que vous vous soyez égaré en chemin, mais heureusement la boussole vous a réorienté ! À l'avenir, soyez plus prudents et ne vous aventurez pas sur des chemins inconnus.");
		
		return $this->redirectToRoute("back_home", array(
			"space" => $space
		));
	}
}