<?php

namespace App\Http\Controllers;

use App\Traits\FlasherMessages;
use App\Traits\PesanNotifications;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, PesanNotifications, FlasherMessages;
}
