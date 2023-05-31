<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Autres traitements avec la donnée récupérée

        return redirect()->back()->with('success', 'Donnée récupérée avec succès.');
    }
}
