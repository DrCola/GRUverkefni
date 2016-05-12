<?php
	include('.db/db.php');


	class Image
	{
		var
		$image_id;
		$image_name;
		$image;

		function insert_into_image()
		{
			if($_FILES["txt_image"])
			{
				$tempname=$_FILES["txt_image"]["tmp_name"];
				$originalname=$_FILES["txt_image"]["name"];
				$size=($_FILES["txt_image"]["size"]/5242880) . " MB<br>";
				$type=$_FILES["txt_image"]["type"];
				$image=$_FILES["txt_image"]["name"];
				move_uploaded_file($_FILES["txt_image"]["tmp_name"],"solaris/images/" ,$_FILES["txt_image"]["name"]);
			}

			$query="insert into users (avatar) values"
		}

		function get_all_images()
		{
			$query="Select * from users";
			$results=mysql_query($query);
			return $results;
		}
	}
?>