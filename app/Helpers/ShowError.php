<?php
    function showError($errors, $name){
        if($errors->has($name)){
           return  '<span class="form-message">'.$errors->first($name).'</span>';
        }
    }

?>