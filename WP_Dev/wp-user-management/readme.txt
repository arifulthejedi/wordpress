
===================login.php=================
=============================================

//CustomUserLogin class
1.default route is /v1/login or custom route can be set on constructor
2.Exmple: $mylogin = new CustomUserLogin("mynamespace/v1","/myroute");
3.formate to send login info {"name":"user_myname","password":"usere_pass"}
4.$mylogin->user_login_handler() this handle the login request from user
5.$mylogin->user_signon($array) $array = ["name"=>"user_name","password"=>"user_password"]; return flag:bool or string massage wp error

   ===================>>O<<================







==========user-registration.php===========
=======================================

//CreateNewUser class
==========>>Rest Functionality<<=========

1.class constructor set namespace for rest
2.rest_route($route,$callback = null) method set the route
   =>Call create_route mathod for creating route for rest operation
   =>$route(required) is array for which define the operation create_route perform
   =>$route = [
   "create" => /value for create route 
   "delete" => /delete,
   "update" => /update,
   "search" => /find
   ];
4.$callback (optional) for custom validation  
         => this function can take $userdata(array).
         => $callback should  return ["flag" => true | false, "massage"=>[array]].
         =>rest_hook() function can call separetely for perform different function(create_user,search,delete_user,update_user)

2.create_route function call while the rest_hook register route
   =>can perform 4 types of route can perform operation(create_user,search,delete_user,update_user)
   =>$route["create"] this route for perform create_user
        #call create_user()
   =>$route["delete"] for perform delete user
        #call delete_user()
   =>$route["update"] for update user data
        #call update_user()
   =>$route["search"] this can perform search by user id | login | email
        #call get_user()

//user array sample
    $user = array(
    'user_login' => $username,
    'user_email' => $email,
    'first_name' => $firstname,
    'last_name' => $lastname,
    'display_name' => $firstname.' '.$lastname,
    'user_pass' => $u_password,
    'role' => 'administrator'
);

==========>>CreateNewUser class Method<<=========

All following Method are public and static so they can be call any where and perform their functionality
*Mathod:1 > create_user($user)
   1.$user(required) take $user a array
   2.return ["err" =>"Error massage"]] or ["user"=>"user details"] details for success

*Mathod:2 > update_user($user)
   1.$user(required) take $user a array
   2.return ["err" =>"Error massage"]] or ["user" => "user details"] details for success

*Mathod:3 > delete_user($user_id,$hnadover_id);
    1.take two arg $user_id and $handover_id(optional)(user who got owner ship of content from deleted user)
    2.return ["flag" => true(success) | false (failed)]

*Mathod:4 > get_user()
     1.take two perameter $slug(id,login,email)  $value(the slug value)
     2.return user details or ["user" => false] for failure

===========>>Sample Code<<============


===============>>O<<==================




=============>>validation<<============
=======================================

//customValidation class

#$regex array has input,text_area,number,date,date_time etc regular expression

#senitize_input($data)  method for senitizing string

#input($arg,$min_len = 1,$max_len) for validate

above all method are static
=================>>O<<===================


==============>>user-filter<<============
=========================================
//Class CustomRedirect
# public methode custom_redirect($redirectUrl(strig),$request_routes(array))
this function take array of routes and redirect to url given to methode

//Class CustomRoute
#custom_route($route,"callback") methode for set a route and route callback
has to add "/" to $route
callback($arg) function has argument of a array which contain value passed in route
the $route can't be multilevel such as $route =  "/route/level"
















