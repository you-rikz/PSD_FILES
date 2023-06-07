<?php 
		require '../connection.php';
		session_start();
	  
	  	$today_date = date_create();
      	date_timezone_set($today_date,timezone_open("+08:00"));
      	$date_today = date_format($today_date,"Y-m-d H:i:s");

		if(isset($_POST['rememberme'])){
			$rememberme = $_POST['rememberme'];
			$_SESSION['rememberme']	= $rememberme; 
		}
		
		$username = $_POST['username'];
		$password = $_POST['password'];

	    $query = "SELECT * FROM tokens WHERE (username='$username' or email='$username') AND  token='$password' AND status=1";
	    $result = mysqli_query($conn, $query);
	    
	    if((mysqli_num_rows($result) > 0)){

	    	while($row = mysqli_fetch_array($result)){
	    		$date_expired = date('Y-m-d H:i', strtotime($row['date_expired']));
	    		$course_id =$row['course_id'];

	    	}
	    	if($date_today >= $date_expired){
				   echo "The token is already expired. Try again or contact the administrator to reset it.";
				   die();
			}
	    	$_SESSION['course_id'] = $course_id;
	    	$_SESSION['token_id'] = $password;
	    	echo '<script> window.location.href = "../client/"; </script>';

	    }else{
	    	$query = "SELECT * FROM accounts WHERE (username='$username' or email='$username') AND  password='$password'";
	    	$result = mysqli_query($conn, $query);
	    	if((mysqli_num_rows($result) > 0)){
	    		while($row = mysqli_fetch_array($result)){
	    			$username =$row['username'];
	    			$password =$row['password'];
	    			if($acc_type =$row['acc_type'] == 0){
	    				$_SESSION['admin'] = 0;
	    			}else{
	    				$_SESSION['admin'] = 1;
	    			}
	    		}
	    		$_SESSION['username'] = $username;
	    		$_SESSION['token_id'] = $password;
	    		
	    		echo '<script> window.location.href = "../dashboard/"; </script>';
		    }else{
		        echo "Wrong username/password. Try again or contact the administrator to reset it.";
		    }

	    }

?>