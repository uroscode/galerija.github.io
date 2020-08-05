<?php

if(isset($_POST['submit'])){
		$file = $_FILES['file'];
		
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];
		
		$fileExt = explode('.', $fileName);//razdavajmo ime slike po tacki
		$fileActualExt = strtolower(end($fileExt));//Uzimamo kranji name .jpg.png
		
		//Witch files u can upload
		$allowed = array('jpg','jpeg','png');
		
		if(in_array($fileActualExt,$allowed)){//Check if allowed is in array
			
			if($fileError === 0){//CHECK IF NO ERRORS EXISTS
				
				if($fileSize < 1000000){//CHECK IF filesize is less then 100mb
					
					$fileNameNew = uniqid('',true).".".$fileActualExt;//PUT image name whole again
					$fileDestination = 'img/'.$fileNameNew;//Path of the upload 
					
					move_uploaded_file($fileTmpName,$fileDestination);//From where to where we upload
					header("Location: upload.php?uploadsuccess");
					
				}else{
					echo "File size must be less then 100mb!";
				}
				
			}else{
				echo "There was an error uploading your file.";
			}
			
		}else{
			echo "You cannot upload files of this type!";
		}
	}
?>


<form action="test_upload.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file" />
	<button type="submit" name="submit" class="">Upload a file</button>
</form>