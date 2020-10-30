<?php

namespace App;

use Coyl\Git\Git;
use Coyl\Git\GitRepo;

class Coyl extends GitTestApp
{
  protected $key = 'coyl';

  /** @var GitRepo */
  private $repo;

  public function openRepo()
  {
    $this->repo = Git::open($this->getPath());
  }

  public function pull()
  {
    $this->repo->pull('origin', 'master');
  }

  /**
   * @return bool
   */
  public function hasChanges()
  {
    return strlen(trim($this->repo->run('cherry origin/master'))) > 0;
  }

  public function commit()
  {
    $this->repo->add($this->getTestFilePath(true));
    $this->repo->commit("{$this->key} modification");
  }

  public function push()
  {
    $this->repo->push('origin', 'master');
  }
}
