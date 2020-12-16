<?php

namespace App\Service;

class ServiceVersion
{
	public function getCurrentVersionNumber(): string
	{
		$version = "0.1.0";
		return $version;
	}
	
	public function getBackofficeVersionNumber(string $backoffice): string
	{
		switch ($backoffice) {
			case "admin":
				return "undefined";
			case "teacher":
				return "0.1.0";
			case "student":
				return "undefined";
			default: return "";
		}
	}
}