<?php

namespace App\Traits;

trait FlasherMessages
{
  public function flashMessage($type, $route, $msg)
  {
    session()->flash($type, $msg);
    return to_route($route);
  }

  public function success($route, $msg)
  {
    return $this->flashMessage('success', $route, $msg);
  }

  public function fail($route, $msg)
  {
    return $this->flashMessage('fail', $route, $msg);
  }

  public function info($route, $msg)
  {
    return $this->flashMessage('info', $route, $msg);
  }

  public function warn($route, $msg)
  {
    return $this->flashMessage('warn', $route, $msg);
  }
}
