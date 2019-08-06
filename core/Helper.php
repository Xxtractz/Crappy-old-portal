<?php


namespace Core;


class Helper
{
    public static function posted_values($post){
        $clean_ary = [];
        foreach ($post as $key => $value) {
            $clean_ary[$key] = Input::sanitize($value);
        }
        return $clean_ary;
    }

    public static function displayErrors($errors) {
        $hasErrors = (!empty($errors))? ' has-errors' : '';
        $html = '<div class="form-errors"><ul class="bg-danger'.$hasErrors.'">';
        foreach($errors as $field => $error) {
            $html .= '<li class="text-danger">'.$error.'</li>';
            $html .= '<script>jQuery("document").ready(function(){jQuery("#'.$field.'").parent().closest("div").addClass("has-error");});</script>';
        }
        $html .= '</ul></div>';
        return $html;
    }

    public static function dnd($data) {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die();
    }

    public static function currentPage() {
        $currentPage = $_SERVER['REQUEST_URI'];
        if($currentPage == PROOT || $currentPage == PROOT.'home/index') {
            $currentPage = PROOT . 'home';
        }
        return $currentPage;
    }

    public static function getObjectProperties($obj){
        return get_object_vars($obj);
    }

    public static function gettoken(){
        $str = "1234567890asdfghjklpoiuytrewqzxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM";
        $random = substr(str_shuffle($str), 0, 12);
        return $random;
    }

    public static function _getpassword(){
        $str = "1234567890asdfghjklpoiuytrewqzxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM";
        $random = substr(str_shuffle($str), 0, 8);
        return $random;
    }
}