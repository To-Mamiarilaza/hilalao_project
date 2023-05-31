<?php
namespace App\Http\Controllers\BO;

use Exception;
use App\Models\BO\AccountBackOffice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


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

    public function checkAccount(Request $request)
    {
        try {
            $model = new AccountBackOffice();
            $mail = $request->input('mail');
            $password = $request->input('password');
            $account = $model->getAccountBackOfficeConnected($mail,$password);
            Session::put('id_account', $account->id_account);
            Session::save();
        
            // Faites ce que vous voulez avec les données récupérées
            return view('BO.resultats', ['account'=>$account]);
        } catch (Exception $e) {
            $errorMessage = "Veuillez ressayer!!";
            return view('BO/login', ['error'=>$errorMessage]);
            // Passer le message d'erreur à la vue
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