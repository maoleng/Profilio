<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

abstract class BaseController extends Controller
{
    abstract protected function getService();
}
