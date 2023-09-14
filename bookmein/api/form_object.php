<?php 

/*
*The form will compoent would be based on request object
*Pattern of request object is provided bellow
*/

//input type email,name,number or any text
$input =(object)["label"=>"Name",
"type"=>"text",
"name"=>"Name",
"placeholder"=>"Write here something",
"required"=>"Input must be betweent 5 to 15 character"
];

$input1 =(object)["label"=>"Occupation",
"type"=>"text",
"placeholder"=>"Write here your Jobs",
"required"=>"Input must be betweent 5 to 15 character"
];


//select
$select = (object)[
"type"=>"select",
"name"=>"Favorite Movie",
"label"=>"Select your Favorite Movie",
"options"=>["Matrix","Alien","Star-War","Avengers","Game of Thrones"],
"reqired"=>"The selction can't be empty"
];

//input type text area
$textarea = (object)[
    "type"=>"textarea",
    "label"=>"Here write something about your story",
    "placeholder"=>"write what to write in place holder",
    "size"=>"4",//allowed 1 to 5
    "required" =>"Write the restrictions and required"
];

//type button
$button = (object)[
    "type"=>"button",
    "color"=>"primary",//primary(blue),secondary(gray),success(green),danger(red),warning(yellow),info(light-blue),light(white),dark(black)
    "label"=>"Submit"
];

//check-box
$checkbox = (object)[
   "type" => "checkbox",
   "label" => "$arg",
   "required"=>"The field must be filled"
];


//radio
$radio = (object)[
    "type"=>"radio",
    "label" => "Male",
    "required"=>"The field must be filled"
];

//file 
$file = (object)[
    "type" => "file",
    "label" => "Choose your pic",
    "required"=> "Only .jpg,.png are allowed"
];


//time and date
$time = (object)[
    "type"=>"date",//date or time
    "label"=>"Choose your convinient time",
    "reqired" =>"This selction must be filled"
];



//main form object
$object =(object)[
[$input],[$input]
];

