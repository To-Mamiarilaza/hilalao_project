<?php
namespace App\Exceptions;

use Exception;

class UserException extends Exception {
    public function __construct($type = "username" ,$message = "", $code = 0)
    {
        parent::__construct($message, $code);
    }

}
?>
