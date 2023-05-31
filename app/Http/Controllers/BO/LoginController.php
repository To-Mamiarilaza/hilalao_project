<?php
namespace App\Http\Controllers\BO;

use App\Models\BO\AccountBackOffice;
use App\Http\Controllers\Controller;

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
}
?>