<?php
namespace App\Traits;

use App\Models\Pesan;
use Illuminate\Support\Facades\Auth;

trait PesanNotifications
{
  public function getUserId()
  {
    return Auth::id();
  }
  public function getJumlahPesan()
  {
    return $this->getPesan()->count();
  }
  public function getPesan()
  {
    return Pesan::where('id_penerima', $this->getUserId())->with(['user','file'])->get();
  }
}
