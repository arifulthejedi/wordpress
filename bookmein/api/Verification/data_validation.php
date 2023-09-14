<?php

/*
*Functionality for validate public data & return false or value
*/


class input_validation{
/*
//password,text,email,number,textarea,time,date,file,checkbox,select input types
input "/^[a-zA-Z0-9]+$/" only letter and number allowed range max 15 min 4

text area "/^[.,!?()a-zA-Z0-9 ]+$/"  range max 150 min 4

number "/^[0-9]+$/" range max 20 min 1

date  "/^((((19|[2-9]\d)\d{2})\-(0[13578]|1[02])\-(0[1-9]|[12]\d|3[01]))|(((19|[2-9]\d)\d{2})\-(0[13456789]|1[012])\-(0[1-9]|[12]\d|30))|(((19|[2-9]\d)\d{2})\-02\-(0[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))\-02\-29))$/" yyyy-mm-dd
 
date "/^(0?[1-9]|1[0-2])\/(0?[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/"  mm-dd-yyyy

time  "/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/"  h:m

email  "/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/" char range 25 char

file   "/^([a-zA-Z0-9_-]*\.(jpg|JPG|jpeg|png|gif|JPG|JPEG|PNG|GIF|doc|DOC|pdf|PDF))$/" size filesize("abs path file") max size 10mb

checkbox  is_bool()

select  "/^[a-zA-Z0-9]+$/" only letter and number allowed range max 10 min 1

radio same as select

*/ 

private $regex = [
    "input"=>"/^[a-zA-Z0-9]+$/",
    "text_area"=>"/^[.,!?()a-zA-Z0-9 ]+$/",
     "number"=>"/^[0-9]+$/",
     "email"=>"/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/",
     "file"=>"/^([a-zA-Z0-9_-]*\.(jpg|JPG|jpeg|png|gif|JPG|JPEG|PNG|GIF|doc|DOC|pdf|PDF))$/",
     "date"=>"/^(0?[1-9]|1[0-2])\/(0?[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/" ,
     "date_time"=>"/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/",
     "select"=>"/^[a-zA-Z0-9]+$/"
];


//sample object [["input"=>"string-input"],["text_area"=>"string"],["input"=>"text"]]
function __construct($obj){
   $arr = "";
  foreach($obj as $el){ 
   foreach($el as $key=>$val){
    if($key == "input")
         $arr += ["input"=>$this->input($val)];
    if($key == "text_area")
         $arr += ["text_area"=>$this->text_area($val)];
    if($key == "number")
         $arr += ["number"=>$this->number($val)];
    if($key == "email")
         $arr += ["email"=>$this->email($val)];
    if($key == "file")
         $arr += ["file"=>$this->file($val)];
    if($key == "date")
         $arr += ["date"=>$this->date($val)];
    if($key == "date_time")
         $arr += ["date_time"=>$this->date_time($val)];
    if($key == "select")
         $arr += ["select"=>$this->select($val)];
    if($key == "radio")
         $arr += ["radio"=>$this->radio($val)];
   }
  }
  return $arr;

}



private function input($arg){
    if(strlen($arg)>=4 && strlen($arg)<=15){
        if(preg_match($this->regex['input'],$arg)){
            return $arg;
        }
    }
    else
      return false;
}

private function text_area($arg){
    if(strlen($arg)>=4 && strlen($arg)<=150){
        if(preg_match($this->regex['text_area'],$arg)){
            return $arg;
        }
    }
    else
      return false;
}


private function number($arg){
    if(strlen($arg)>=1 && strlen($arg)<=15){
        if(preg_match($this->regex['number'],$arg)){
            return $arg;
        }
    }
    else
      return false;
}



private function email($arg){
    if(strlen($arg)>=4 && strlen($arg)<=20){
        if(preg_match($this->regex['email'],$arg)){
            return $arg;
        }
    }
    else
      return false;
}

private function date($arg){
    if(strlen($arg)<=12 && strlen($arg)>4){
        if(preg_match($this->regex['date'],$arg)){
            return $arg;
        }
    }
    else
      return false;
}

private function date_time($arg){
    if(strlen($arg)<=10 && strlen($arg)>4){
        if(preg_match($this->regex['date_time'],$arg)){
            return $arg;
        }
    }
    else
      return false;
}

private function select($arg){
    if(strlen($arg)<=10 && strlen($arg)>=1){
        if(preg_match($this->regex['select'],$arg)){
            return $arg;
        }
    }
    else
      return false;
}

private function radio($arg){
    if(is_bool($arg))
       return true;
    else
       return false;
}


};
