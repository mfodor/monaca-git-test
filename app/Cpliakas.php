<?php

namespace App;

use GitWrapper\GitWrapper;

class Cpliakas extends GitTestApp
{
  protected $key = 'cpliakas';

  /** @var \GitWrapper\GitWorkingCopy */
  private $git;

  public function openRepo()
  {
    $wrapper = new GitWrapper();
//    $wrapper->setPrivateKey('/Users/manuel/.ssh/id_rsa');
    $this->git = $wrapper->workingCopy($this->getPath());
  }

  public function pull()
  {
    $this->git->pull();
  }

  public function hasChanges()
  {
    return $this->git->hasChanges();
  }

  public function commit()
  {
    $this->git->add($this->getTestFilePath(true));
    $this->git->commit("{$this->key} modification");
  }

  public function push()
  {
    $this->git->push();
  }
}
