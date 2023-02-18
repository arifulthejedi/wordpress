<?php


/*
*Create New users
*Update user
*Delete user
*find user by user credentials
*/

class CreateNewUser{

public $namespace,$route,$callback;
/*
route array
$route = [
   "create" => /value for create route 
   "delete" => /delete,
   "update" => /update,
   "search" => /find

];
*/

//setting namespace with constructor

public function __construct($name){
  $this->namespace = $name; 
}

public function rest_route($rt,$callback = null) //action hook for initiate the rest
{
   $this->route = $rt;
   $this->callback = $callback;
   add_action('rest_api_init', [$this, 'create_route']);
 }

   //registering route
   public function create_route(){
     
/*
    route for create user
    sample object
    $user_data = array(
    'user_login' => $username,
    'user_email' => $email,
    'first_name' => $firstname,
    'last_name' => $lastname,
    'display_name' => $firstname.' '.$lastname,
    'user_pass' => $u_password,
    'role' => 'administrator'
);
*/
      if($this->route['create']){
         register_rest_route(
            $this->namespace, $this->route['create'],
            [
              'methods' => 'POST',
              'callback' => function(WP_REST_Request $req){
                 $user = (array) json_decode($req->get_body());
                 /*
                 validation call back must return array[
                  "flag"=> true | false 
                  "massage" => massage if validation failed or null
                 ];
                 
                 */
                 if($this->callback){
                   $result = callback($user);
                    if($result['flag']){
                     return json_encode($this->create_user($user));
                    }
                    return json_encode($result['massage']);
                 }
                return json_encode($this->create_user($user)); //return user or err object
              }
            ]
          );
      }

      //delete
      /*
      sample object
      $user = [
         "user_id"=> number,
         "hand_over"=> number(id of user)
      ];
      */
      if($this->route['delete']){
         register_rest_route(
            $this->namespace, $this->route['delete'],
            [
              'methods' => 'POST',
              'callback' => function(WP_REST_Request $req){
                 $user = (array) json_decode($req->get_body());
                 /*
                 data validation should add here
                 */
                if($this->callback){
                  $result = callback($user);
                   if($result['flag']){
                    return json_encode($this->delete_user($user));
                   }
                   return json_encode($result['massage']);
                }
                return json_encode($this->delete_user($user['user_id'],$user['hand_over'])); //flag:true for success false for failure
              }
            ]
          );
      }


/*
   //update
    $user_data = array(
    'user_login' => $username,
    'user_email' => $email,
    'first_name' => $firstname,
    'last_name' => $lastname,
    'display_name' => $firstname.' '.$lastname,
    'user_pass' => $u_password,
    'role' => 'administrator'
);

it's not nesessary to provide all information for update user 
it's possible only one element can be passed for update
*/
      if($this->route['update']){
         register_rest_route(
            $this->namespace, $this->route['update'],
            [
              'methods' => 'POST',
              'callback' => function(WP_REST_Request $req){
                 $user = (array) json_decode($req->get_body());
                 /*
                 data validation should add here
                 */
                if($this->callback){
                  $result = callback($user);
                   if($result['flag']){
                    return json_encode($this->update_user($user));
                   }
                   return json_encode($result['massage']);
                }
                return json_encode($this->update_user($user));//return user for success or wp error for failure
              }
            ]
          );
      }

  /*
  search user by id or name
      sample object
      $user = [
         "slug"=> id | login | email
         "value"=> value of slug
      ];
      */
      if($this->route['search']){
         register_rest_route(
            $this->namespace, $this->route['search'],
            [
              'methods' => 'POST',
              'callback' => function(WP_REST_Request $req){
                 $user = (array) json_decode($req->get_body());
                 /*
                 data validation should add here
                 */
                if($this->callback){
                  $result = callback($user);
                   if($result['flag']){
                    return json_encode($this->get_user($user));
                   }
                   return json_encode($result['massage']);
                }
                return json_encode($this->get_user($user['slug'],$user['value']));//return user deatil or user:false for failure
              }
            ]
          );
      }

   }


    //return user or err object
    public  function create_user($user){
     if($user['user_login'] && $user['user_pass']){
        $user['role'] = $user['role']?  $user['role']: "subscriber";
        $result = wp_insert_user($user);
        if(!is_wp_error($result)){
            return ["user"=>$result];
        }
        return ["err" => $result->get_error_message()];
     }
     return ["err" => "required credentials can't be empty"];
    }
    
    //update user
    public  function update_user($user){
         $result = wp_update_user($user);
         if(!is_wp_error($result)){
            return ["user" => $result]; //user details
         }
         return ["err" => $result->get_error_message()]; //return the error if it failed
    }

   //get user by $slug =  id login email
   public  function get_user($slug,$value){
     $result = get_user_by($slug,$value);
     if(!$result) {
        return ["user" => false];
     }
     return $result;    
   }

   //delete user return flag with bool
   public function delete_user($user_id,$handover_id = null){
         //delete user with user id, handover user id or null
        $result =  wp_delete_user($user_id,$handover_id);
        if($result) return ["flag"=> true];
        return ["flag"=> false];
   }

}


 

