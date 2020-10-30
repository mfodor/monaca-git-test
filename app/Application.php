<?php

namespace App;

class Application
{
	public function run() {
		(new Cpliakas())->run()->printResults();
		(new Czproject())->run()->printResults();
		(new Cypresslab())->run()->printResults();
	}
}
