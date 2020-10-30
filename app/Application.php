<?php

namespace App;

class Application
{
	public function run() {
	  $testApps = [
		  new Cpliakas(),
		  new Czproject(),
		  new Cypresslab(),
		  new Coyl(),
    ];

		foreach ($testApps as $testApp) {
		  /** @var GitTestApp $testApp */
		  $testApp->run()->printResults();
    }
	}
}
