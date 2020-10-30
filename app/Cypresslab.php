<?php

namespace App;

use GitElephant\Repository;

class Cypresslab extends GitTestApp
{
  protected $key = 'cypresslab';

  /** @var Repository */
  private $repo;

  /**
   * @throws \GitElephant\Exception\InvalidRepositoryPathException
   */
  public function openRepo()
  {
    $this->repo = new Repository($this->getPath());
  }

  public function pull()
  {
    $this->repo->pull();
  }

  /**
   * @return bool
   */
  public function hasChanges()
  {
    return strlen(trim($this->repo->getCaller()->execute('cherry origin/master')->getRawOutput())) > 0;
  }

  public function commit()
  {
    $this->repo->stage($this->getTestFilePath(true));
    $this->repo->commit("{$this->key} modification");
  }

  public function push()
  {
    $this->repo->push();
  }
}
