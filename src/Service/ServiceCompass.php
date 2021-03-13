<?php

namespace App\Service;

use Symfony\Component\Security\Core\User\UserInterface;

class ServiceCompass
{
	public function getUserBackoffice(UserInterface $user): string
	{
		switch ($user->getRoles()[0]) {
			case "ROLE_TEACHER":
				return "teacher";
			case "ROLE_STUDENT":
				return "student";
			case "ROLE_ADMIN":
				return "admin";
			default: return "";
		}
	}
}