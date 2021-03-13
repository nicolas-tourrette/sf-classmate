<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request,
	Symfony\Component\HttpFoundation\RedirectResponse,
	Symfony\Component\HttpFoundation\Session\Session,
	Symfony\Component\Routing\Router;

class AccessDenied
{
	protected Session $_session;
	protected Router $_router;
	protected Request $_request;
	
	public function __construct(Session $session, Router $router, Request $request)
	{
		$this->_session = $session;
		$this->_router = $router;
		$this->_request = $request;
	}
	
	public function onAccessDeniedException(GetResponseForExceptionEvent $event)
	{
		if ($event->getException()->getMessage() == 'Access Denied')
		{
			$this->_session->setFlash('error', 'Access Denied. You do not have permission to access this page.');
			
			if ($this->_request->headers->get('referer'))
			{
				$route = $this->_request->headers->get('referer');
			} else {
				$route = $this->_router->generate('front_home');
			}
			
			$event->setResponse(new RedirectResponse($route));
		}
	}
}