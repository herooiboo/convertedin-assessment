<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Traits\Searchable;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use Searchable;
    protected $configurations;

    public function __construct()
    {
        $this->configurations['model'] = Admin::class;
    }
}