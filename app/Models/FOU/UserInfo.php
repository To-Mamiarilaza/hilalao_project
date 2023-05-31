<?php

use Illuminate\Support\Facades\DB;

    class UserInfo {
        public $id_user;
        public $name;
        public $email;
        public $dtn;
        public $mdp;

        public function getUser($userName, $password) {
            $sql = "SELECT * FROM name = '%s' AND mdp = '%s'";
            $request = sprintf($sql, $userName, $password);
            $response = DB::select($request);
        }
    }