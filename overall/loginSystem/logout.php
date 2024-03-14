<?php

class logout
{


    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("location: /aceTrain/overall/LoginSystem/loginStudent.php");
    }


}
$logout = new logout();
$logout->logout();
?>