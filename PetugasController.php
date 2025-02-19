<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->level !== 'petugas') {
            return redirect('/user')->with('error','AccesDenied ');
        }

        return view('petugas.index');
    }
}
