<?php
    session_start();
    define("BASE_URL","http://localhost/estateagency/admin/");
    function url($var = null){
        return BASE_URL . $var;
    }
    function auth($ruleTwo = null, $ruleThree = null){
        if (isset($_SESSION['admin'])) {
            if ($_SESSION['admin']['rule'] == 1 || $_SESSION['admin']['rule'] == $ruleTwo || $_SESSION['admin']['rule'] == $ruleThree) {
                redirect('index.php');
            } else {
                redirectForOutApp('pages-error-404.php');
            }
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


    function filterValidation($input){
        $input = trim($input);
        $input = strip_tags($input);
        $input = htmlspecialchars($input);
        $input = stripslashes($input);
        return $input;
    }

    function stringValidation($input, $minLengthSize = 2, $maxLengthSize = 50){
        $empty = empty($input);
        $minLength = strlen($input) < $minLengthSize;
        $maxLength = strlen($input) > $maxLengthSize;
        if ($empty == true || $minLength == true || $maxLength == true) {
            return true;
        }else{
            return false;
        } 
    }

    function numberValidation($input, $minLengthSize, $maxLengthSize){
        $empty = empty($input);
        $minLength = strlen($input) < $minLengthSize;
        $maxLength = strlen($input) > $maxLengthSize;
        $isNegative = $input < 0;
        $NotNumber = filter_var($input, FILTER_VALIDATE_FLOAT) == false;
        if ($empty == true || $minLength == true || $maxLength == true || $isNegative == true || $NotNumber == true) {
            return true;
        }else{
            return false;
        } 
    }

    function fileSizeValidation($image_Size, $your_size = 2)
    {
        $size = ($image_Size / 1024) / 1024;
    
        $sizeBiger = $size > $your_size;
        if ($sizeBiger == true) {
            return true;
        } else {
            return false;
        }
    }
    
    function filterTypeValidation($file_type, $type1 = null, $type2 = null, $type3 = null, $type4 = null)
    {
        if ($file_type == "$type1" || $file_type == "$type2" || $file_type == "$type3" || $file_type == "$type4") {
            return false;
        } else {
            return true;
        }
    }