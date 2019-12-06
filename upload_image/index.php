<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['img_submit']){
		$permited = array('png', 'jpg', 'jpeg', 'gif', 'pdf', 'doct', 'accdb', 'pptx', 'txt');
		$file_name = $_FILES["up_img"]["name"];
		$file_size = $_FILES["up_img"]["size"];
		$file_temp = $_FILES["up_img"]["tmp_name"];
		$remove_first_part = explode('.', $file_name);
		$file_ext = strtolower(end($remove_first_part));
		$new_name = substr(rand('0123456789', 5),0, 5).time() . '.' . $file_ext;
		if(empty($file_name)){
			echo "Your field must not be empty";
		}elseif($file_size > 2621440){
			echo "Your file is so long";
		}elseif(in_array($file_ext ,$permited) === FALSE){
			echo "not match";
		}else{
			move_uploaded_file($file_temp, 'uploads/' . $new_name );
		}
	}
?>
<form action="" method="post" enctype="multipart/form-data">

	<input type="file" name="up_img" />
	<input type="submit" name="img_submit" />
</form>