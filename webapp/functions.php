<?php
function random_strings($length_of_string) // CREATE token
{
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($str_result), 0, $length_of_string);
}
 
//email_token.php
function check_exists($conn,$username, $email) // Check if username and email exists in the DB
{
    $sql_u = "SELECT * FROM tokens WHERE username='$username'";
    $sql_e = "SELECT * FROM tokens WHERE email='$email'";
    
    $res_u = mysqli_query($conn, $sql_u);
    $res_e = mysqli_query($conn, $sql_e);
    
    if (mysqli_num_rows($res_u) > 0) {
      return TRUE;  
    }else if(mysqli_num_rows($res_e) > 0){
      return TRUE;    
    }else{
      return FALSE;
    }
}

//email_token.php
function token_exists($conn, $token) // Check if the token exists in the DB
{
    $sql_t = "SELECT * FROM tokens WHERE token='$token'";
    $res_t = mysqli_query($conn, $sql_t);
    if (mysqli_num_rows($res_t) > 0) {
      $new_token = random_strings(6);
      return $new_token;  
    }else{
      return $token;
    }
}

//results.php
function check_answers($question, $option, $all_questions){
    foreach ($all_questions as $value) {
        if($value[0] == $question){
            if($value[1] == $option){
            	return 1;
           }
    	}
    }
    return 0;
}

//results.php
function results_checked($question, $option, $array){
    foreach ($array as $value) {
	   if($value[0] == $question){
	        if($value[1] == $option){
            	if($value[2] == $option){
					return 'activecorrect';
                }
                    return 'activecorrect';
            }
        }
    }
    	return "";
}

//results.php
function results_checked_color($question, $option, $graded, $questions){
	//FOR ANSWERED
	foreach ($graded as $value) {
		if($value[0] == $question){
			if($value[1] == $option){
				if($value[2] == 1){
					return 'activecorrect';
				}else{
					return 'activewrong';
				}
			}
		}
	}
    //FOR UNANSWERED
	foreach ($questions as $value) {
		if($value[0] == $question){
			if($value[1] == $option){
				return 'activecorrect';
			}
		}
	}

    return "";
}

//exam.php
function checked_reload($question, $option, $last_saved){
    foreach ($last_saved as $value) {
        if($value[0] == $question){
            if($value[1] == $option){
                return "checked";
            }
        }
    }
    return "";
}

//exam.php
function session_exists($conn, $session){
    $sql_t = "SELECT * FROM exam_session WHERE session_id='$session'";
    $res_t = mysqli_query($conn, $sql_t);
    if (mysqli_num_rows($res_t) > 0) {
      $new_session_id = random_strings(10);
      return $new_session_id;  
    }else{
      return $session;
    }
}
