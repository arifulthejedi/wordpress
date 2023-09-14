<?php 

//senitizing the validate data

function senitize_input($data) {
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = preg_replace("/[^{$allow}a-zA-Z0-9 ?().,!]/","",$data);
    return $data;
  }