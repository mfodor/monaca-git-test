<?php

namespace App;

class Application
{
	public function run() {
		(new Cpliakas())->run()->printResults();
	}
}
