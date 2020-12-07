<?php

namespace App\Service;

class ServiceVersion {
	public function getCurrentVersionNumber(): string {
		$version = "0.1.0";
		return $version;
	}
}