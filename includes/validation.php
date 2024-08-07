<?php

function validation($form_data){
    $data=$_POST[$form_data];
    if(empty($data)){
        echo"input cannot be empty";
    }else{
        return $data;
    }
}

?>