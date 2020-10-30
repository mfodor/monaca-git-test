<?php

namespace App;

abstract class GitTestApp
{
  /** @var Profiler */
	protected $profiler;

	/** @var string */
  protected $key = 'xxx';

	public function __construct()
	{
		$this->profiler = new Profiler();
	}

  /**
   * @return static
   */
	public function run()
  {
    $this->profiler->recordTime('start');
    $this->openRepo();
    $this->profiler->recordTime('opened');
    $this->pull();
    $this->profiler->recordTime('pulled');
    $this->changeFile();
    $this->profiler->recordTime('file changed');
    $this->hasChanges();
    $this->profiler->recordTime('has changes');
    $this->commit();
    $this->profiler->recordTime('committed');
    $this->push();
    $this->profiler->recordTime('pushed');

    return $this;
  }

  public function printResults()
  {
    echo "\n========================================\n";
    echo "Results of '{$this->key}'\n";
    echo "----------------------------------------\n";
    $this->profiler->printResults();
    echo "========================================\n\n";
  }

  public abstract function openRepo();
  public abstract function pull();

  public function changeFile()
  {
    $fileName = $this->getTestFilePath();
    touch($fileName);
    $contents = file_get_contents($fileName);
    $contents .= $this->getLog();
    file_put_contents($fileName, $contents);
  }

  public abstract function hasChanges();
  public abstract function commit();
  public abstract function push();

  /**
   * @return string
   */
	protected function getPath()
  {
    return repo_path($this->key);
  }

  /**
   * @return string
   */
	protected function getLog()
  {
    $time = date('Y-m-d H:i:s');
    return "[{$time}] {$this->key}\n";
  }

  /**
   * @param bool $relative
   * @return string
   */
  protected function getTestFilePath($relative = false)
  {
    $relativePath = 'profiling.txt';

    if ($relative) {
      return $relativePath;
    }

    return $this->getPath() . '/' . $relativePath;
  }
}
