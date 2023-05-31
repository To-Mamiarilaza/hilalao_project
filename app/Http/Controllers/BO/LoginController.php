<?php
namespace App\Http\Controllers\BO;

use App\Models\BO\AccountBackOffice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function all()
    {
        try {
            $model = new AccountBackOffice();
            $all = $model->getAllAccountBackOffice();
            return view('BO.all', ['all' => $all]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function saveAll(Request $request)
    {
        $model = new AccountBackOffice();

        $model -> setName($request->input('nom'));
        $model ->setFirstname($request->input('prenom'));
        $model ->setTelephoneNumber($request->input('tel'));
        $model->setMail($request->input('mail'));
        $model->setPassword($request->input('pwd'));

        $model-> save();
        
        return view('BO/login');
    }
}
?>