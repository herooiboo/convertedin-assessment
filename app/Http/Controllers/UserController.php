<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\Searchable;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use Searchable;
    protected $configurations;

    public function __construct()
    {
        $this->configurations['model'] = User::class;
    }
}