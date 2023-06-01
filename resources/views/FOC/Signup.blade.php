<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOC/css/sign.css') }}">
    <title>HILALAO | LOGIN</title>
</head>
<body>
    <div class="container box">
        <div class="row sign_box">
            <h1 class="box__title">Sign <span class="box__title--span">up</span></h1>
            <h5><i>Client account</i></h5>
            <div class="col-md-6 elements">
                <form action="{{ route('insertCustomer') }}" method="POST" class="col-md-12 form-content">
                    <input class="form-content__input form-content__input--log" type="text" placeholder="Customer's name" name="Username" aria-label=".form-control-lg">
                    <input class="form-content__input form-content__input--log" type="email" placeholder="Email" name="email" aria-label=".form-control-lg">
                    <input class="form-content__input form-content__input--log" type="tel" placeholder="Phone number" name="phone_numbers" aria-label=".form-control-lg">
                    <input class="form-content__input form-content__input--log" type="text" placeholder="Local adress" name="address" aria-label=".form-control-lg">
                    <input class="form-content__input form-content__input--log" type="password" placeholder="Password" name="password" aria-label=".form-control-lg" id="password">
                    <input class="form-content__input form-content__input--log" type="text" placeholder="card number" name="card_number" aria-label=".form-control-lg" id="password">
                    <div class="form-content__checkbox">
                        <input type="checkbox" class="form-content__input form-content__input--showing-password" onclick="showPassword()">
                        <label for="form-content__label--showing-password">Show Password</label>
                    </div>
                    <button type="submit" class="form-content__input--submit">SIGN IN</button>
                </form>
            </div>
            <div class="col-md-6 elements">
                <div class="row">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>Profile picture</h3>
                        </div>
                        <div class="input_pictures">
                        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
                            <input type="file" name="fichier">
                            <input type="submit" name="envoyer" value="Ajouter">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    function showPassword() {
        var password = document.getElementById("password");
        if (password.checked) {
            password.type = "password";
            password.checked = false;
        } else {
            password.type = "text";
            password.checked = true;
        }
        console.log(password.checked);
    }
</script>
</html>