<?php

include "Registration.php";

$dsn = "mysql:host=localhost;dbname=pdc10_db";
$user = "root";
$passwd = "";

$pdo = new PDO($dsn, $user, $passwd);
$result = Registration::handleUpload($_FILES['input_file']);
if ($result == "error"){
	header('Location: index.php?error=' . "error file type");
}
else{
	if ($result !== FALSE) {
		try {
			// Save the registration info
			$encrpyted_pass = md5($_POST['password']);
			$register = new Registration($_POST['complete_name'], $_POST['email'], $password = $encrpyted_pass, $result['save_path']);
            
			$result = $register->save();
			header('Location: index.php?success=1');
		}
		catch (Exception $e) {
			error_log($e->getMessage());
		}
	} else {    

		header('Location: index.php?error=' . $e->getMessage());
	}
}