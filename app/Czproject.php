<?php

namespace App;

use Cz\Git\GitException;
use Cz\Git\GitRepository;

class Czproject extends GitTestApp
{
  protected $key = 'czproject';

  /** @var GitRepository */
  private $repo;

  /**
   * @throws GitException
   */
  public function openRepo()
  {
    $this->repo = new GitRepository($this->getPath());
  }

  /**
   * @throws GitException
   */
  public function pull()
  {
    $this->repo->pull();
  }

  /**
   * @return bool
   * @throws GitException
   */
  public function hasChanges()
  {
    return $this->repo->hasChanges();
  }

  /**
   * @throws GitException
   */
  public function commit()
  {
    $this->repo->addFile($this->getTestFilePath(true));
    $this->repo->commit("{$this->key} modification");
  }

  /**
   * @throws GitException
   */
  public function push()
  {
    $this->repo->push();
  }
}
