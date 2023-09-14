<?php 

/*
Function for creating Bootstrape Form
*/

function form($object,$formComponents){
    $component = '';//final form component string

    foreach($object as $obj){
        foreach($obj as $arr){
            if($arr->type == 'text' || $arr->type == 'email'|| $arr->type == 'number' || $arr->type == 'password'){
                $x = $formComponents->text($arr);
                $component = $component.$x;            
            }
            if($arr->type == 'textarea'){
                $x = $formComponents->textarea($arr);
                $component = $component.$x;            
            }
            if($arr->type == 'select'){
                $x = $formComponents->select($arr);
                $component = $component.$x;            
            }
            if($arr->type == 'button'){
                $x = $formComponents->button($arr);
                $component = $component.$x;            
            }
            if($arr->type == 'checkbox'){
                $x = $formComponents->checkbox($arr);
                $component = $component.$x;            
            }
            if($arr->type == 'time' || $arr->type == 'date' ){
                $x = $formComponents->time($arr);
                $component = $component.$x;            
            }
            if($arr->type == 'radio'){
                $x = $formComponents->radio($arr);
                $component = $component.$x;            
            }
            if($arr->type == 'file'){
                $x = $formComponents->file($arr);
                $component = $component.$x;            
            }
    }
    }
    

return  "<div class='form-div'><form class='form'>".$component."</form></div>"; //returning form component

}


//send form component as post to wp_post table by ajax