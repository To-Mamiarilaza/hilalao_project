<?php

namespace App\Http\Controllers\FOU;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\FOU\UserFOU;
use App\Exceptions\UserException;

class LogController extends Controller
{

    public function index() {
        return $this->log();
    }

    public function log($error = ""): View
    {
        return view('FOU/login', ['error' => $error]);
    }



    public function sign(): View
    {
        return view('FOU/sign');
    }

    public function signup(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $dtn = $request->input('dtn');
        $contact = $request->input('contact');
        $idgenre = $request->input('idgenre');
        $mdp = $request->input('mdp');
        $user = new UserFou();
        $user->setName($name);
        $user->setEmail($email);
        $user->setDTN($dtn);
        $user->setContact($contact);
        $user->setIdGenre($idgenre);
        $user->setMDP($mdp);
        $user->save();
    }

    public function signin(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');
        $user = new UserFOU();
        $user->setName($username);
        $user->setMDP($password);
        try {
            $userConnected = $user->log();
            return View('FOU/login', ['error' => ""]);
        } catch (UserException $e) {
            return View('FOU/login', ['error' => $e->getType()]);
        }
    }
}

?>
