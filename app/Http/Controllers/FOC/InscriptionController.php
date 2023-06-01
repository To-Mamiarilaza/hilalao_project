<?php
    namespace App\Http\Controllers\FOC;

    use App\Models\FOC\Customer;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class InscriptionController extends Controller
    {
        public function insertCustomer(Request $request)
        {
            $name = $request->input('Username');
            //$customer_id_card = $request->input('customer_id_card');
            $email = $request->input('email');
            $profile_picture = $request->input('profile_picture');
            $address = $request->input('address');
            $phone_numbers = $request->input('phone_numbers');
            $password = $request->input('password');
            echo $name;
            echo $email;
            echo $profile_picture;
            echo $address;
            echo $phone_numbers;
            echo $password;
            if($name != "" && /*$customer_id_card != "" &&*/ $email != "" && $profile_picture != "" && $address != "" && $phone_numbers != "" && $email != "" && $password != "")
            {
                $customer = new Customer($name, /*$customer_id_card ,*/ $profile_picture, $address, $phone_numbers, $email,$password);
                $customer->create();

                return view('FOC/acceuil');
            }
            else{
                /* redirect to sign up page  */
                return view('FOC/signup');
            }
        }
    }
?>