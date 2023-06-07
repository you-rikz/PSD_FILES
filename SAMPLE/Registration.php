<?php

class Registration
{
	protected $id;
	protected $complete_name;
    protected $email;
    protected $password;
	protected $picture_path;

	const TYPE_IMAGE = 'image';
	const DIRECTORY_IMAGES = 'uploads/';

	public function __construct(
        $complete_name,
        $email,
        $password,
		$picture_path = null
	)
	{
        $this->complete_name = $complete_name;
        $this->email = $email;
        $this->password = $password;
		$this->picture_path = $picture_path;
	}

	public function getName()
	{
		return $this->complete_name;
	}

	public function getPath()
	{
		return $this->picture_path;
	}

	public function getEmail()
	{
		return $this->email;
	}
	
    public function getPassword()
	{
		return $this->password;
	}

	public function save()
	{
		global $pdo;
		try {

			$sql = "INSERT INTO registrations SET complete_name=:complete_name, email=:email, password=:password, picture_path=:picture_path";
			$statement = $pdo->prepare($sql);

			return $statement->execute([
                ':complete_name' => $this->getName(),
                ':email' => $this->getEmail(),
                ':password' => $this->getPassword(),
				':picture_path' => $this->getPath()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

    //this is done
	public static function handleUpload($fileObject)
	{
		try {
			$base_dir = getcwd() . '/';
			$target_dir = $base_dir . static::DIRECTORY_IMAGES;

			$file_type = $_FILES['input_file']['type'];
			$allowed = array("image/jpeg", "image/gif", "image/png");
			if(!in_array($file_type, $allowed)) {
				$error_message = 'error';
				return $error_message;
			}
			else{
				if (is_uploaded_file($fileObject['tmp_name'])) {
					$target_file_path = $target_dir . $fileObject['name'];
					$save_file_path = static::DIRECTORY_IMAGES . $fileObject['name'];
					if (move_uploaded_file($fileObject['tmp_name'], $target_file_path)) {
						return [
							'picture_path' => $target_file_path,
							'save_path' => $save_file_path
						];
					}
				}
			}
		} catch (Exception $e) {
			error_log($e->getMessage());
			return false;
		}
	}
}