<?php
namespace App\Exceptions;

use Exception;

class UserException extends Exception {
    public $type;

    public function __construct($type = "username" ,$message = "", $code = 0)
    {
        parent::__construct($message, $code);
        $this->setType($type);
    }

    public function setType($value) {
        $this->type = $value;
    }

    public function getType() {
        return $this->type;
    }

}
?>
