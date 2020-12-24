<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaHomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:anggota');
    }
    public function index()
    {
        return view('index_anggota');
    }
}
