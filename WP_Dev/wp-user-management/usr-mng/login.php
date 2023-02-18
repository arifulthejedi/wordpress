<?php
//grant user login if user credentials are valid
if (!isset($GLOBALS['loggedin'])) {
  $GLOBALS['loggedin'] = is_user_logged_in();
}

class CustomUserLogin
{
  public $namespace, $route;
  public function __construct($name = "v1", $rt = "/login")
  {
    //set the route for  login
    $this->namespace = $name;
    $this->route = $rt;
  }

  public function user_login_handler()
  {
    add_action('rest_api_init', [$this, 'user_login_req']);
  }

  public function user_login_req()
  {
    register_rest_route(
      $this->namespace, $this->route,
      [
        'methods' => 'POST',
        'callback' => [$this, 'user_login'],
      ]
    );
  }

  public function user_login(WP_REST_Request $req)
  {
    if (!$GLOBALS['loggedin']) {
      $login_data = (array) json_decode($req->get_body()); //this array to sent login data to sinon function
      return json_encode($this->user_sinon($login_data));
    }
    return json_encode(["flag" => "user already logged-in"]);
  }

  //wp_signon() function perfrom here
  public function user_sinon($arr)
  {
    $user = [];
    $user['user_login'] = $arr['name'];
    $user['user_password'] = $arr['password'];
    $login_status = wp_signon($user); //wp function for sin-in

    if (!is_wp_error($login_status))
      return ["flag" => true]; //if request failed

    return ["flag" => false]; //if success
  }
}

?>