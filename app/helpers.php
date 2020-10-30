<?php

if (!function_exists('')) {
  function repo_path($path) {
    if ($path[0] === '/') {
      $path = substr($path, 1);
    }
    return BASE_DIR . "/repos/{$path}";
  }
}
