<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimerControlador extends Controller
{
    function index() {
        return view('contact', ['nombre' => 'Dario']);
    }

    function store(){
        return 'store';
    }

    function create($request){
        return $request;
    }

    function show($request){
        return $request;
    }

    function update($request){
        return $request;
    }

    function destroy($request){
        return $request;
    }

    function edit($request){
        return $request;
    }


    

}