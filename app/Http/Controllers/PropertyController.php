<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller{
   public function propertyList(){
    $user = Auth::user();
    return view('admin.pages.property.property-list', compact('user'));
   }
}
