<?php 

function wp_file_upload(){


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );
    
        $files = $_FILES["my_file_upload"];
        foreach ($files['name'] as $key => $value) {
            if ($files['name'][$key]) {
                $file = array(
                    'name' => $files['name'][$key],
                    'type' => $files['type'][$key],
                    'tmp_name' => $files['tmp_name'][$key],
                    'error' => $files['error'][$key],
                    'size' => $files['size'][$key]
                );
                $_FILES = array("upload_file" => $file);
                $attachment_id = media_handle_upload("upload_file", 0);
    
                if (is_wp_error($attachment_id)) {
                    // There was an error uploading the image.
                    echo "Error adding file";
                } else {
                    // The image was uploaded successfully!
                    echo "File added successfully with ID: " . $attachment_id . "<br>";
                    echo wp_get_attachment_image($attachment_id, array(800, 600)) . "<br>"; //Display the uploaded image with a size you wish. In this case it is 800x600
                }
            }
        }
    }
}

/*
the form need to implemented as same
particularly the neme
my_file_upload[]
*/

?>


<form id="file_upload" method="post" enctype="multipart/form-data">
     <input type="file" name="my_file_upload[]" multiple="multiple">
     <input name="my_file_upload" type="submit" value="Upload" />
</form>