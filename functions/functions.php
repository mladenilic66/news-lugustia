<?php

// dynamic title tag
function tab_name() {

    $replace = array("-","_");

    $data = basename($_SERVER['PHP_SELF'],".php");
    $data = str_replace($replace, " ", $data);
    $data = ucwords($data);

    if ($data === "Index") {
        $data = "Home";
    }

    return $data . ' | ' . $_SERVER['HTTP_HOST'];
}

	
// securing inputs from injection /* !need to be tested! */
function test_input($data) {

    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = html_entity_decode($data);
    $data = htmlspecialchars($data);
    if (empty($data)) {
        return false;
    }
    return $data;
}

// replacing whitespace and comma in url
function url_rewrite($data) {
    $data = str_replace(" ", "-", $data);
    $data = str_replace(",", "", $data);
    if (empty($data)) {
        return false;
    }
    return $data;
}

// showing short format date
function date_short($data,$format = "M jS Y") {
    $data = strtotime($data);
    $data = date($format, $data);
    return $data;
}

// securing custom textarea
function trim_textarea($data) {
    $replace = array("&amp;","nbsp");
    $data = str_replace($replace, "", $data);
    $data = trim($data);
    if (empty($data)) {
        return false;
    }
    return $data;
}

// creates uniqe id only with integers
function uniq_id() {
    $data = substr(number_format(time() * rand(),0,"",""),0,8);
    $data = (int) $data;
    return $data;
}


// limiting number of characters
function short_title($data,$limit,$endpoint = "...") {
    if (strlen($data) > $limit) {
        $data = substr($data, 0, $limit).$endpoint;
    }
    return $data;
}

// switching image
function img_switch($img,$src,$dft,$alt = "default name") {

    if(!empty($img)) {
        echo "<img src='".$src.$img."' alt='".$alt."'>";
    } else {
        echo "<img src='".$dft."' alt='".$alt."'>";
    }
}

// getting real ip address from user
function get_real_ip() {

    //check ip from share internet
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {

      $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { //to check ip is pass from proxy

      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    } else {

      $ip = $_SERVER['REMOTE_ADDR'];

    }

    return $ip;
}

// redirect user if not logged in and if not certen role
function authorization($session,$role_session,$role_id,$role_id2,$role_id3 = "") {

    if (isset($session) && $role_session != (int) $role_id && $role_session != (int) $role_id2) {

        header("Location: http://news.lenuson.com");
    }
    
    if (!isset($session)) {

        header("Location: http://news.lenuson.com");
    }
}


// redirect user if not logged in
function redirect($session) {

    if (!isset($session)) {

        header("Location: http://news.lenuson.com");
    }
}


// giving new uniq name to file
function rename_img($file_name,$base,$more_entropy = false) {

    if (!empty($file_name)) {
        $path_info = pathinfo($file_name);
        $file_name = uniqid($base,$more_entropy);
        $file_name .= ".".$path_info['extension'];
    } else {
        $file_name = "";
    }

    return $file_name;
}


//resize and crop image by center
function img_crop_resize($max_width, $max_height, $source_file, $new_name, $quality = 100) {
    $imgsize = getimagesize($source_file);
    $width = $imgsize[0];
    $height = $imgsize[1];
    $mime = $imgsize['mime'];
 
    switch($mime) {
 
        case 'image/png':
            $image_create = "imagecreatefrompng";
            $image = "imagepng";
            break;
 
        case 'image/jpeg':
            $image_create = "imagecreatefromjpeg";
            $image = "imagejpeg";
            break;
 
        default:
            return false;
            break;
    }
     
    $dst_img = imagecreatetruecolor($max_width, $max_height);
    $src_img = $image_create($source_file);
     
    $width_new = $height * $max_width / $max_height;
    $height_new = $width * $max_height / $max_width;
    //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
    if($width_new > $width) {
        //cut point by height
        $h_point = (($height - $height_new) / 2);
        //copy image
        imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
    } else {
        //cut point by width
        $w_point = (($width - $width_new) / 2);
        imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
    }

    $image = imagejpeg($dst_img, $new_name, $quality);
}