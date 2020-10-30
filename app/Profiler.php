<?php

namespace App;

class Profiler
{
	private $times = [];

	public function recordTime($label)
	{
	  $shot = new \stdClass();
	  $shot->label = $label;
	  $shot->time = microtime(true);
	  $this->times[] = $shot;

		return $this;
	}

	public function getResults()
	{
		return $this->times;
	}

	public function printResults()
	{
		if (!count($this->times)) {
			echo "No recorded times.\n";
			return;
		}

		$previousTime = 0;
		foreach($this->times as $time) {
		  if ($previousTime > 0) {
        $timePassed = $time->time - $previousTime;
        echo "{$time->label}: {$timePassed}\n";
      }
			$previousTime = $time->time;
		}
		$total = $this->times[count($this->times) - 1]->time - $this->times[0]->time;
    echo "----------------------------------------\n";
		echo "Total: {$total}\n";
	}
}
