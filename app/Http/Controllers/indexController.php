<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    
     public function index(){
       return view('welcome');
  }
   
     public function register(){
       return view('register');
  }
    
     public function login(){
       return view('login');
  }
  
    
}