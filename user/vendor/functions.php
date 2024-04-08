<?php
    session_start();
    define("BASE_URL","http://localhost/estateagency/admin/");
    function url($var = null){
        return BASE_URL . $var;
    }
    function auth(){
        if (isset($_SESSION['admin'])) {
            redirect('index.php');
        }
        else{
            echo `
                <script>
                    window.location.replace('http://localhost/estateagency/admin/app/pages-login.php')
                </script>
            `;
        }
    }
    function getMessage($condition, $message){
        if ($condition) {
            $_SESSION['done']="$message successfully";
        }
    }
    function getMessageAdmin($condition, $message){
        if ($condition) {
            $_SESSION['done']="$message";
        }
    }

    function redirect($currentPage){
        echo `
        <script>
            window.location.replace('http://localhost/estateagency/admin/app/$currentPage')
        </script>
        `;
    }
    function redirectForOutApp($currentPage){
        echo `
        <script>
            window.location.replace('http://localhost/estateagency/admin/$currentPage')
        </script>
        `;
    }
    function redirectToFunction($currentPage,$function){
        echo `
        <script>
            window.location.replace('http://localhost/estateagency/admin/app/$currentPage . $function')
        </script>
        `;
    }
    function clearSessionDone($currentPage){
        if (isset($_POST['clearSession'])) {
            unset($_SESSION['done']);
            redirect($currentPage);
        }
    }
    function clearSession_Done(){
        if (isset($_POST['clearSession'])) {
            unset($_SESSION['done']);
        }
    }