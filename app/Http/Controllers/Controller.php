<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

require __DIR__ . "/Common/GetData.php";

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
