<?php

define("__APATH__", "http://" . $_SERVER['HTTP_HOST']);

require_once "db_connect.php";
require_once "functions/functions.php";



if (isset($_REQUEST["form_id"])) {


switch ($_REQUEST["form_id"]) {

	case "register":
	    session_start();

	    if (empty($_POST["username_r"]) || empty($_POST["first_name_r"]) || empty($_POST["last_name_r"]) || empty($_POST["password_r"]) && isset($_POST["register"])) {

	    	$_SESSION['msg'] = "No empty fields";
	    	die(header("Location: " . __APATH__ . "/?user=Register"));

	    } else {

	    $username = test_input($_POST["username_r"]);
		$email_r = test_input($_POST["email_r"]);
		$password = strip_tags($_POST["password_r"]);
		$password_rpt_r = strip_tags($_POST["password_rpt_r"]);
		$first_name = test_input($_POST["first_name_r"]);
		$last_name = test_input($_POST["last_name_r"]);
        $inicial_role = "2";

	    $salt  = ["cost" => 12];

		$hashed_password =  password_hash($_POST["password_r"], PASSWORD_DEFAULT, $salt);

	    $sql_username = "SELECT * FROM author WHERE username = '".$username."'";
	    $result_username = mysqli_query($con, $sql_username);
	    $exists = mysqli_num_rows($result_username);

	    if (!filter_var($email_r, FILTER_VALIDATE_EMAIL)) {
	    	$_SESSION['msg'] = "E-mail not valid";
            die(header("Location: " . __APATH__ . "/?user=Register"));
        }

	    if ($exists > 0) {
	    	$_SESSION['msg'] = "Username Taken";
	        die(header("Location: " . __APATH__ . "/?user=Register"));
	    }

	    if ($password != $password_rpt_r) {
	    	$_SESSION['msg'] = "Password do not match";
	    	die(header("Location: " . __APATH__ . "/?user=Register"));
	    }
	
		if (strlen($password) < 8) {
			$_SESSION['msg'] = "Minimum 8 characters for password";
			die(header("Location: " . __APATH__ . "/?user=Register"));
		}

		if (strlen($username) < 3) {
			$_SESSION['msg'] = "Minimum 3 characters for username";
			die(header("Location: " . __APATH__ . "/?user=Register"));
		}

        // avatar
        if (isset($_FILES["avatar"])) {

	        $avatar_org = $_FILES["avatar"];
	        $avatar = $_FILES["avatar"]["name"];
	        $avatar_error = $_FILES["avatar"]["error"];
	        $avatar_tmp = $_FILES["avatar"]["tmp_name"];
	        $avatar_type = $_FILES["avatar"]["type"];
			$avatar_size = $_FILES["avatar"]["size"];
	        $avatar_maxsize = 5242880;


	        $new_avatar_name = rename_img($avatar,"user-avatar-");
	        $source = "uploads/user_images/";
	        $target = "uploads/user_images/";
           

			if($avatar_error !== 0) {
		        $_SESSION['msg'] = "Error while uploading avatar";
		    } elseif($avatar_size > $avatar_maxsize) {
		        $_SESSION['msg'] = "Max avatar size 5MB";
		    } elseif($avatar_type !== "image/jpeg" && $avatar_type !== "image/jpg") {
		    	$_SESSION['msg'] = "Only JPEG,JPG allowed";
		    } else {

		        $save_image = move_uploaded_file($avatar_tmp,"uploads/user_images/".$new_avatar_name);
		        $croped_resized_img = img_crop_resize(500,500,$source.$new_avatar_name,$target.$new_avatar_name);
		    }
		}

		$sql_reg = "INSERT into author(username,email,firstname,lastname,avatar,role_id,password) values('".$username."','".$email_r."','".$first_name."','".$last_name."','".$new_avatar_name."','".$inicial_role."','".$hashed_password."')";


		if (mysqli_query($con,$sql_reg)) {
			$_SESSION['msg'] = "Successfully registered";
			die(header("Location: " . __APATH__ . "/?user=Login"));
		} else {
			$_SESSION['msg'] = "Something went wrong";
			die(header("Location: " . __APATH__ . "/?user=Register"));
		}

	    }
	break;


	case "add_user":
	    session_start();

	    if (empty($_POST["username_a"]) || empty($_POST["first_name_a"]) || empty($_POST["last_name_a"]) || empty($_POST["password_a"]) && isset($_POST["add_user"])) {

	    	$_SESSION['msg'] = "No empty fields";
	    	die(header("Location: " . __APATH__ . "/admin/new_user"));

	    } else {

	    $username = test_input($_POST["username_a"]);
	    $email_a = test_input($_POST["email_a"]);
		$password = $_POST["password_a"];
		$password_rpt_a = $_POST["password_rpt_a"];
		$first_name = test_input($_POST["first_name_a"]);
		$last_name = test_input($_POST["last_name_a"]);
		$role = $_POST["roles_a"];


	    $salt  = ["cost" => 12];

		$hashed_password =  password_hash($_POST["password_a"], PASSWORD_DEFAULT, $salt);

	    $sql_username = "SELECT * FROM author WHERE username = '".$username."'";
	    $result_username = mysqli_query($con, $sql_username);
	    $exists = mysqli_num_rows($result_username);

	    if (!filter_var($email_a, FILTER_VALIDATE_EMAIL)) {
	    	$_SESSION['msg'] = "E-mail not valid";
            die(header("Location: " . __APATH__ . "/admin/new_user"));
        }

	    if ($exists > 0) {
	    	$_SESSION['msg'] = "Username Taken";
	        die(header("Location: " . __APATH__ . "/admin/new_user"));
	    }

	    if ($password != $password_rpt_a) {
	    	$_SESSION['msg'] = "Password do not match";
	    	die(header("Location: " . __APATH__ . "/admin/new_user"));
	    }
	
		if (strlen($password) < 8) {
			$_SESSION['msg'] = "Min 8 characters for password";
			die(header("Location: " . __APATH__ . "/admin/new_user"));
		}

		if (strlen($username) < 3) {
			$_SESSION['msg'] = "Minimum 3 characters for username";
			die(header("Location: " . __APATH__ . "/admin/new_user"));
		}

        
		// avatar
        if (isset($_FILES["avatar_a"])) {

	        $avatar_org = $_FILES["avatar_a"];
	        $avatar = $_FILES["avatar_a"]["name"];
	        $avatar_error = $_FILES["avatar_a"]["error"];
	        $avatar_tmp = $_FILES["avatar_a"]["tmp_name"];
	        $avatar_type = $_FILES["avatar_a"]["type"];
			$avatar_size = $_FILES["avatar_a"]["size"];
	        $avatar_maxsize = 5242880;


	        $new_avatar_name = rename_img($avatar,"user-avatar-");
	        $source = "uploads/user_images/";
	        $target = "uploads/user_images/";
           

			if($avatar_error !== 0) {
		        $_SESSION['msg'] = "Error while uploading avatar";
		    } elseif($avatar_size > $avatar_maxsize) {
		        $_SESSION['msg'] = "Max avatar size 5MB";
		    } elseif($avatar_type !== "image/jpeg" && $avatar_type !== "image/jpg") {
		    	$_SESSION['msg'] = "Only JPEG,JPG allowed";
		    } else {

		        $save_image = move_uploaded_file($avatar_tmp,"uploads/user_images/".$new_avatar_name);
		        $croped_resized_img = img_crop_resize(500,500,$source.$new_avatar_name,$target.$new_avatar_name);
		    }
		}


		$sql_reg = "INSERT into author(username,email,firstname,lastname,avatar,role_id,password) values('".$username."','".$email_a."','".$first_name."','".$last_name."','".$new_avatar_name."','".$role."','".$hashed_password."')";


		if (mysqli_query($con,$sql_reg)) {
			$_SESSION['msg'] = "User successfully added";
			die(header("Location: " . __APATH__ . "/admin/new_user"));
		} else {
			$_SESSION['msg'] = "Something went wrong";
			die(header("Location: " . __APATH__ . "/admin/new_user"));
		}

	    }
	break;



    case "login":
		session_start();

		if (isset($_POST["login"]) && count($_POST) > 0) {

			$username = test_input($_POST['username']);
			$password = test_input($_POST['password']);


		    if(isset($_SESSION['usr_id']) != "") {
			    header("Location: " . __APATH__);
		    }

			$sql = "SELECT * FROM author WHERE username = '".$username."'";
			$result = mysqli_query($con,$sql);

			if ($row = mysqli_fetch_assoc($result)) {

				if (password_verify($password, $row['password'])) {

					$_SESSION['usr_id'] = $row['id'];
					$_SESSION['usr_name'] = $row['username'];
					$_SESSION['usr_role'] = $row['role_id'];
					$_SESSION['user_data'] = $user;
		            setcookie("user_id", $row['id'], time()+86400, "/");

					header("Location: " . __APATH__);
				} else {
					$_SESSION['msg'] = "Wrong Password";
				    die(header("Location: " . __APATH__ . "/?user=Login"));
			    }

			} else {
				$_SESSION['msg'] = "Wrong Username";
				die(header("Location: " . __APATH__ . "/?user=Login"));
			}
		}

	break;

	case "logout":
        session_start();
        setcookie("user_id", $_SESSION['usr_id'], time()-172800, "/");

        session_destroy();
           unset($_SESSION['usr_id']);
           unset($_SESSION['usr_name']);
           unset($_COOKIE['user_id']);

        header("Location: " . __APATH__);
    break;


    case "add_article":
        session_start();

	    if (empty($_POST["title"]) || empty($_POST["content"]) && isset($_POST["add_article"])) {
	    	$_SESSION['msg'] = "No empty fields";
	    	die(header("Location: " . __APATH__ . "/admin/new_article"));
	    } else {

	    $title = test_input($_POST["title"]);
		$content = htmlspecialchars($_POST["content"]);
		$categories = $_POST["categories"];

        // image
	    $image_org     = $_FILES["image"];
	    $image         = $_FILES["image"]["name"];
	    $image_error   = $_FILES["image"]["error"];
	    $image_tmp     = $_FILES["image"]["tmp_name"];
	    $image_type    = $_FILES["image"]["type"];
		$image_size    = $_FILES["image"]["size"];
	    $image_maxsize = 10485760;

	    $new_image_name = rename_img($image,"article-image-");
	    $source = "uploads/news_images/";
	    $target = "uploads/news_images/";


		if (!empty($image)) {

			if ($image_type !== "image/jpeg" && $image_type !== "image/jpg" && $image_type !== "image/png") {
				$_SESSION['msg'] = "Only JPEG,JPG,PNG allowed";
				die(header("Location: " . __APATH__ . "/admin/new_article"));
		    } elseif($image_size > $image_maxsize) {
		    	$_SESSION['msg'] = "Image too large";
				die(header("Location: " . __APATH__ . "/admin/new_article"));
		    } else {
		    	$save_image = move_uploaded_file($image_tmp,"uploads/news_images/".$new_image_name);
		        $croped_resized_img = img_crop_resize(980,620,$source.$new_image_name,$target.$new_image_name);

		    }
	    }


		$sql_art = "INSERT INTO article(id_user,cat_title,title,content,image) values('".$_SESSION['usr_id']."','".$categories."','".$title."','".$content."','".$new_image_name."')";


		if (mysqli_query($con,$sql_art)) {
			$_SESSION['msg'] = " Article successfully added";
			die(header("Location: " . __APATH__ . "/admin/new_article"));
		} else {
			$_SESSION['msg'] = "Something went wrong";
			die(header("Location: " . __APATH__ . "/admin/new_article"));
		}

	    }
	break;


	case "add_category":
        session_start();

	    if (empty($_POST["category"]) && isset($_POST["add_category"])) {
	    	$_SESSION['msg'] = "No empty fields";
	    	die(header("Location: " . __APATH__ . "/admin/categories"));
	    } else {

		    $category = test_input($_POST["category"]);

		    $sql_title = "SELECT cat_title FROM category WHERE cat_title = '".$category."'";
		    $result = mysqli_query($con, $sql_title);
		    $exists = mysqli_num_rows($result);

		    if ($exists > 0) {
		    	$_SESSION['msg'] = "Category already exists";
		        die(header("Location: " . __APATH__ . "/admin/categories"));
		    }

			$sql = "INSERT INTO category (cat_title) values('".$category."')";

			if (mysqli_query($con,$sql)) {
				$_SESSION['msg'] = "Category successfully added";
				die(header("Location: " . __APATH__ . "/admin/categories"));
			} else {
				$_SESSION['msg'] = "Something went wrong";
				die(header("Location: " . __APATH__ . "/admin/categories"));
			}
	    }
	break;
	


	case "contact":
	    session_start();

	    if (empty($_POST["name"]) || empty($_POST["email"]) && isset($_POST["submit"])) {
	    	$_SESSION['msg'] = "No empty fields";
	    	die(header("Location: " . __APATH__ . "/contact"));
	    } else {

	    //securing from injection
	    $name = test_input($_POST["name"]);
		$email = test_input($_POST["email"]);
		$message = test_input($_POST["message"]);

	        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

	        	$_SESSION['msg'] = "E-mail not valid";
			    die(header("Location: " . __APATH__ . "/contact"));

			} else {

				$to = "mladenilic321@googlemail.com";
				$subject = "Contact Form";
				$headers = "From: ".$email;

				if (mail($to,$subject,$message,$headers)) {
					$_SESSION['msg'] = "Message Sent";
					die(header("Location: " . __APATH__ . "/contact"));
				} else {
					$_SESSION['msg'] = "Message has not been sent";
					die(header("Location: " . __APATH__ . "/contact"));
				}
			}
	    }
	break;


	case "comments":

	    session_start();

	    $id = $_GET['article'];
    	$sql = "SELECT cat_title,title FROM article WHERE id=".$id;
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);

        $comment = test_input($_POST['comment']);

        // chect if field is not empty , if user is loggedin and if button is set
	    if (empty($_POST["comment"]) && isset($_SESSION['usr_id']) && isset($_POST['send_comment'])) {

	    	$_SESSION['msg'] = "Write something";
	    	die(header("Location: " . __APATH__ . "/details?category=".$row['cat_title']."&article=".$id."&title=".url_rewrite($row['title'])."#com_label"));

	    } elseif(isset($_POST['send_comment']) && !isset($_SESSION['usr_id'])) {

        	$_SESSION['msg'] = "Need to be logged in";
        	die(header("Location: " . __APATH__ . "/details?category=".$row['cat_title']."&article=".$id."&title=".url_rewrite($row['title'])."#com_label"));

        } else {

            $sql = 'INSERT INTO comments(id_user,id_article,comment) values("'.$_SESSION['usr_id'].'","'.$id.'","'.$comment.'")';
			
            if(mysqli_query($con,$sql)){
            	$_SESSION['msg'] = "Successfully Commented!";
				die(header("Location: " . __APATH__ . "/details?category=".$row['cat_title']."&article=".$id."&title=".url_rewrite($row['title'])."#com_label"));
            } else {
            	$_SESSION['msg'] = "Not Commented";
				die(header("Location: " . __APATH__ . "/details?category=<".$row['cat_title']."&article=".$id."&title=".url_rewrite($row['title'])."#com_label"));
            }
	    } 

	break;


	case "edit_article":
	    session_start();

	    $id = $_GET['article'];

	    if (empty($_POST["title"]) || empty($_POST["content"]) && isset($_POST["edit_article"])) {
	    	$_SESSION['msg'] = "No empty fields";
	    	die(header("Location: " . __APATH__ . "/admin/article?action=edit&article=".$id));
	    } else {

	    $title       = test_input($_POST["title"]);
		$content     = htmlspecialchars($_POST["content"]);
		$categories  = $_POST["categories"];

		// load records
		$sql = "SELECT image FROM article WHERE id=".$id;
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);

        // avatar
	    $image_org     = $_FILES["image"];
	    $image         = $_FILES["image"]["name"];
	    $image_error   = $_FILES["image"]["error"];
	    $image_tmp     = $_FILES["image"]["tmp_name"];
	    $image_type    = $_FILES["image"]["type"];
		$image_size    = $_FILES["image"]["size"];
	    $image_maxsize = 10485760;

	    $new_image_name = rename_img($image,"article-image-");
	    $source = "uploads/news_images/";
	    $target = "uploads/news_images/";


		if (!empty($image)) {

			if ($image_type !== "image/jpeg" && $image_type !== "image/jpg" && $image_type !== "image/png") {
				$_SESSION['msg'] = "Only JPEG,JPG,PNG allowed";
				die(header("Location: " . __APATH__ . "/admin/new_article"));
		    } elseif($image_size > $image_maxsize) {
		    	$_SESSION['msg'] = "Image too large";
				die(header("Location: " . __APATH__ . "/admin/new_article"));
		    } else {
		    	$save_image = move_uploaded_file($image_tmp,"uploads/news_images/".$new_image_name);
		        $croped_resized_img = img_crop_resize(980,620,$source.$new_image_name,$target.$new_image_name);
		    }
	    }

        // delete old image and replace with new one
		if (!empty($image)) {

            if ($row['image'] <> $image) {
                unlink($source . $row['image']);
            }
        }

        (!empty($image)) ? $img = ',image="'.$new_image_name.'"' : $img = '';

        $sql = '
		    UPDATE article 
		    SET cat_title="'.$categories.'",
		    title="'.$title.'",
		    content="'.$content.'"
		    '.$img.',
		    updated="'.date("Y-m-d H:i:s").'" 
		    WHERE id="'.$id.'"
		';


		if (mysqli_query($con,$sql)) {
			$_SESSION['msg'] = "Article successfully edited";
			die(header("Location: " . __APATH__ . "/admin/article?action=edit&article=".$id));
		} else {
			$_SESSION['msg'] = "Something went wrong";
			die(header("Location: " . __APATH__ . "/admin/article?action=edit&article=".$id));
		}

	    }

	break;



	case "edit_category":
	    session_start();

	    $id = $_GET['category'];

	    if (empty($_POST["category"]) && isset($_POST["edit_category"])) {
	    	$_SESSION['msg'] = "No empty fields";
	    	die(header("Location: " . __APATH__ . "/admin/categories?action=edit&category=".$id));
	    } else {


		$category = test_input($_POST["category"]);


		$sql = 'UPDATE category SET cat_title="'.$category.'",updated="'.date("Y-m-d H:i:s").'" WHERE id="'.$id.'"';


		if (mysqli_query($con,$sql)) {
			$_SESSION['msg'] = "Category successfully edited";
			die(header("Location: " . __APATH__ . "/admin/categories"));
		} else {
			$_SESSION['msg'] = "Something went wrong";
			die(header("Location: " . __APATH__ . "/admin/categories"));
		}

	    }

	break;



	case "edit_comment":
	    session_start();

	    $id = $_GET['comment'];

	    if (empty($_POST["comment"]) && isset($_POST["edit_comment"])) {
	    	$_SESSION['msg'] = "No empty fields";
	    	die(header("Location: " . __APATH__ . "/admin/comments?action=edit&comment=".$id));
	    } else {


		$com = trim_textarea($_POST["comment"]);


		$sql = 'UPDATE comments SET comment="'.$com.'",updated="'.date("Y-m-d H:i:s").'" WHERE id="'.$id.'"';


		if (mysqli_query($con,$sql)) {
			$_SESSION['msg'] = "Comment successfully edited";
			die(header("Location: " . __APATH__ . "/admin/comments?action=edit&comment=".$id));
		} else {
			$_SESSION['msg'] = "Something went wrong";
			die(header("Location: " . __APATH__ . "/admin/comments?action=edit&comment=".$id));
		}

	    }
	    
	break;

	case "edit_user":
	    session_start();

	    $id = $_GET['user'];

	    if (empty($_POST["email_edit"]) && isset($_POST["edit_user"])) {
	    	$_SESSION['msg'] = "No empty fields";
	    	die(header("Location: " . __APATH__ . "/admin/users?action=edit&user=".$id));
	    } else {
       
	    $email    	  = test_input($_POST["email_edit"]);
		$roles_edit   = $_POST["roles_edit"];

        $sql = 'UPDATE author SET 
			role_id="'.$roles_edit.'",
			email="'.$email.'",
			updated="'.date("Y-m-d H:i:s").'" 
			WHERE id="'.$id.'"'
		;

		if (mysqli_query($con,$sql)) {
			$_SESSION['msg'] = "User successfully edited";
			die(header("Location: " . __APATH__ . "/admin/users?action=edit&user=".$id));
		} else {
			$_SESSION['msg'] = "Something went wrong";
			die(header("Location: " . __APATH__ . "/admin/users?action=edit&user=".$id));
		}

		}
	break;


    

    case "edit_profile":
	    session_start();

	    if (empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"]) && isset($_POST["edit_profile"])) {
	    	$_SESSION['msg'] = "No empty fields";
	    	die(header("Location: " . __APATH__ . "/profile"));
	    } else {
       

	    $firstname = test_input($_POST["firstname"]);
		$lastname  = test_input($_POST["lastname"]);
		$email     = test_input($_POST["email"]);
		$bio       = test_input($_POST["bio"]);
		$password  = $_POST["edit_password"];

		$salt  = ["cost" => 12];
		$hashed_password =  password_hash($password, PASSWORD_DEFAULT, $salt);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    	$_SESSION['msg'] = "E-mail not valid";
            die(header("Location: " . __APATH__ . "/profile"));
        }

		if (!empty($bio)) {
			$bio = $bio;
		}

		// load records
		$user_id = $_SESSION["usr_id"];
		$sql = "SELECT avatar FROM author where id=".$user_id;
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);


        // avatar
	    $avatar_org     = $_FILES["avatar"];
	    $avatar         = $_FILES["avatar"]["name"];
	    $avatar_error   = $_FILES["avatar"]["error"];
	    $avatar_tmp     = $_FILES["avatar"]["tmp_name"];
	    $avatar_type    = $_FILES["avatar"]["type"];
		$avatar_size    = $_FILES["avatar"]["size"];
	    $avatar_maxsize = 10485760;

	    $new_avatar_name = rename_img($avatar,"user-avatar-");
	    $source = "uploads/user_images/";
	    $target = "uploads/user_images/";


		if (!empty($avatar)) {

			if ($avatar_type !== "image/jpeg" && $avatar_type !== "image/jpg" && $avatar_type !== "image/png") {
				$_SESSION['msg'] = "Only JPEG,JPG,PNG allowed";
				die(header("Location: " . __APATH__ . "/profile"));
		    } elseif($avatar_size > $avatar_maxsize) {
		    	$_SESSION['msg'] = "Image too large";
				die(header("Location: " . __APATH__ . "/profile"));
		    } else {
		    	$save_image = move_uploaded_file($avatar_tmp,"uploads/user_images/".$new_avatar_name);
		        $croped_resized_img = img_crop_resize(500,500,$source.$new_avatar_name,$target.$new_avatar_name);
		    }
	    } 

        // delete old image and replace with new one
		if (!empty($avatar)) {

            if ($row['avatar'] <> $avatar) {
                unlink($source . $row['avatar']);
            }
        }

        (!empty($avatar)) ? $ava = ',avatar="'.$new_avatar_name.'"' : $ava = '';

        // checking if new password is passed
        (!empty($password)) ? $pass = ',password="'.$hashed_password.'"' : $pass = '';


        $sql = 'UPDATE author SET 
		    firstname="'.$firstname.'",
			lastname="'.$lastname.'"
			'.$ava.',
			email="'.$email.'",
			bio="'.$bio.'"
			'.$pass.',
			updated="'.date("Y-m-d H:i:s").'" 
			WHERE id="'.$_SESSION['usr_id'].'"'
		;


		if (mysqli_query($con,$sql)) {
			$_SESSION['msg'] = "Profile successfully edited";
			die(header("Location: " . __APATH__ . "/profile"));
		} else {
			$_SESSION['msg'] = "Something went wrong";
			die(header("Location: " . __APATH__ . "/profile"));
		}

		}
	break;


	case "delete_article":

		if(isset($_POST['del'])) {

			if (isset($_POST['delete'])) {
		    	$each = implode(",",$_POST['delete']);
		    	$sql = "DELETE FROM article WHERE id IN (".$each.")";
		    	$result = mysqli_query($con,$sql);
		    }
        }

        header("Location: " . __APATH__ . "/admin/article");

	break;


	case "delete_user":

		if(isset($_POST['del'])) {

			if (isset($_POST['delete'])) {

		    	$each = implode(",",$_POST['delete']);
	    	    $sql = "DELETE FROM author WHERE id IN (".$each.")";

	    	    if ($each != 1 && !in_array(1, $each)) {
	    	    
	    		    $result = mysqli_query($con,$sql);
	    	    }
		    }
        }

        header("Location: " . __APATH__ . "/admin/users");

	break;


	case "delete_categories":

		if(isset($_POST['del'])) {

			if (isset($_POST['delete'])) {
		    	$each = implode(",",$_POST['delete']);
		    	$sql = "DELETE FROM category WHERE id IN (".$each.")";
		    	$result = mysqli_query($con,$sql);
		    }
        }

        header("Location: " . __APATH__ . "/admin/categories");

	break;


	case "delete_comments":

		if(isset($_POST['del'])) {

			if (isset($_POST['delete'])) {
		    	$each = implode(",",$_POST['delete']);
		    	$sql = "DELETE FROM comments WHERE id IN (".$each.")";
		    	$result = mysqli_query($con,$sql);
		    }
        }

        header("Location: " . __APATH__ . "/admin/comments");

	break;

}
}