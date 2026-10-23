<?php
namespace App\Controllers;

class HomeController{
    function index(){
        return view('home');
    }
    function contact(){
        return view('contact');
    }
}