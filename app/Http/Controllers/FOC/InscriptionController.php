<?php
    namespace App\Http\Controllers\FOC;

    use App\Models\FOC\Customer;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class InscriptionController extends Controller
    {
        public function upload(){
            if (isset($_FILES['fichier'])) {
                //echo "tafa";
                $dossier = '../uploads/';
                $fichier = basename($_FILES['fichier']['name']);
                $taille = filesize($_FILES['fichier']['tmp_name']);
                $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.pdf');
                $extension = strrchr($_FILES['fichier']['name'], '.');
                $nom_image = $_FILES['fichier']['name'];
                //Début des vérifications de sécurité...
                if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
                {
                  $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc';
                }
                if (!isset($erreur)) {
                  //S'il n'y a pas d'erreur, on upload
                  //On formate le nom du fichier ici...
                  $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                  if (move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)) //Si
                  {
                    $command = 'python ../python/predict_equation.py';
                    $output = exec($command);
                    //header('location:../pages/index.php?out='.$output);
                  }
                }
              }
        }
        public function insertCustomer(Request $request)
        {
            $name = $request->input('Username');
            $email = $request->input('email');
            $profile_picture = $request->input('profile_picture');
            $address = $request->input('address');
            $phone_numbers = $request->input('phone_numbers');
            $password = $request->input('password');
            $card_number = $request->input('card_number');
            echo $name;
            echo $email;
            echo $profile_picture;
            echo $address;
            echo $phone_numbers;
            echo $password;
            if($name != "" && $card_number != "" &&*/ $email != "" && $profile_picture != "" && $address != "" && $phone_numbers != "" && $password != "")
            {
                $customer = new Customer($name, $customer_id_card , $profile_picture, $address, $phone_numbers, $email,$password);
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