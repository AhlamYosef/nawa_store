<?php

namespace App\Http\Controllers;

use Faker\Guesser\Name;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        return __METHOD__;
    }
    public function show($name)
    {
        return $name;
    }
}
