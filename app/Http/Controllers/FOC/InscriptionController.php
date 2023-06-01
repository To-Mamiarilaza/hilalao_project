<?php
    namespace App\Http\Controllers\FOC;

    use App\Models\FOC\GestionClient\Customer;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class InscriptionController extends Controller
    {
        public function insertCustomer(Request $request)
        {
            $profile_picture = "";
            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                $extension = $file->getClientOriginalExtension();
                $allowedExtensions = ['png', 'gif', 'jpg', 'jpeg', 'pdf'];
                
                if (in_array($extension, $allowedExtensions)) {
                    $path = public_path('image/Client');
                    $imageName = $file->getClientOriginalName();
                   
                    $file->move($path,$imageName);
                    
                    $profile_picture = $imageName;
                    
                } else {
                    $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, ou pdf';
                    echo $erreur;
                }
            }

            $name = $request->input('name');
            $email = $request->input('email');
            $adress = $request->input('address');
            $phone_numbers = $request->input('phoneNumber');
            $password = $request->input('password');
            $card_number = $request->input('idCard');

            echo $profile_picture;
            $customer = new Customer(null,$name, $card_number, $profile_picture, $adress, $phone_numbers, $email, $password);
            $customer->create();
        }
    }
?>