<?PHP

/*
    sample object for creating user or update user
    $user_data = array(
    'user_login' => $username,
    'user_email' => $email,
    'first_name' => $firstname,
    'last_name' => $lastname,
    'display_name' => $firstname.' '.$lastname,
    'user_pass' => $u_password,
    'role' => 'administrator'
);
                 
validation call back must return array[
"flag"=> true | false 
"massage" => massage if validation failed or null
];
                 
*/



class customValidation{

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
    
        
    //senitizing the validate data    
    public static function senitize_input($data) {
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = preg_replace("/[^{$allow}a-zA-Z0-9 ?().,!]/","",$data);
        return $data;
      }
    
    //this function return true and array of data take input,minimum length or maximum length
      public static function input($arg,$min_len = 1,$max_len){
        if(strlen($arg)>=4 && strlen($arg)<=$len){
            if(preg_match($this->regex['input'],$arg)){
                return $arg;
            }
        }
        else
          return false;
    }
    
}