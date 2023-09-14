<?php

//components class for making form compoent
class formComponents{
//here you can add constructor

function text($arg){
//name,number,email
$input = '
<div class="form-group">
<label>'.$arg->label.'</label>
<input name='.$arg->name.' class="form-control" type="'.$arg->type.'" placeholder="'.$arg->placeholder.'">
<small id="verification" class="text-muted">
  '.$arg->required.'
</small>
</div>
';

return $input;

}

function textarea($arg){
//Text Area
$textarea = '
<div class="form-group">
    <label for="exampleFormControlTextarea1">'.$arg->label.'</label>
    <textarea name='.$arg->name.' class="form-control" id="form-textarea"  placeholder="'.$arg->placeholder.' rows="'.$arg->size.'"></textarea>
    <small id="verification" class="text-muted">
  '.$arg->required.'
   </small>
</div>';

return $textarea;
}


function button($arg){
  //button 
$button = '<div class="form-group">
<button type="button" class="btn btn-'.$arg->color.' btn-'.$arg->size.'">'.$arg->label.'</button>
</div>';

return $button;
}


function select($arg){
  //select
$opt = '';
foreach($arg->options as $op) $opt= $opt.'<option>'.$op.'</option>';
$select = '<div class="form-group">
<label for="exampleFormControlSelect1">'.$arg->label.'</label>
<select name='.$arg->name.' class="form-control" id="exampleFormControlSelect1">
  '.$opt.'
</select>
<small id="verification" class="text-muted">
  '.$arg->required.'
</small>
</div>';

return $select;
}

function checkbox($arg){
  //checkbox
  $check_box = 
  '<div class="form-check">
  <input name='.$arg->name.' type="checkbox" class="form-check-input" id="checkbox1">
  <label class="form-check-label" for="exampleCheck1">'.$arg->label.'</label>
  <small id="verification" class="text-muted">
  '.$arg->required.'
  </small>
  </div>';

return $check_box;
}




function radio($arg){
$radio = 
//radio
'<div class="form-check">
<input name='.$arg->name.' class="form-check-input" type="radio" name="radio" id="exampleRadios1" value="option1" checked>
<label class="form-check-label" for="exampleRadios1">
'.$arg->label.'
</label>
<small id="verification" class="text-muted">
  '.$arg->required.'
</small>
</div>
';

return $radio;
}



function file($arg){
$file = 
//file 
'
<div class="custom-file">
<label class="form-label" for="customFile">'.$arg->label.'</label>
<input name='.$arg->name.' type="file" class="form-control" id="customFile" />
<small id="verification-file" class="text-muted">
'.$arg->required.'
 </small>
</div>
';

return $file;
}


//date and time
function time($arg){
$schedule = '
<div class="form-group">
<label>'.$arg->label.'</label>
<input name='.$arg->name.' class="form-control" type="'.$arg->type.'">
<small id="verification-time" class="text-muted">
'.$arg->required.'
</small>
</div>
';

return $schedule;

}

};