<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
	$dbcon = mysqli_select_db($conn,DBNAME);
	// select loggedin users detail
	$res=mysqli_query($conn,"SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);


if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
     
        //Insert image content into database
        $query = "UPDATE `users` SET Image='$imgContent' WHERE userId=".$_SESSION['user'];
			
			$res = mysqli_query($conn,$query);
			
        
     if($res){
            echo "File uploaded successfully.";
            header("Location: home.php");
		
        }else{
            echo "File upload failed, please try again.";
             header("Location: home.php");
		
        } 
    }else{
        echo "Please select an image file to upload.";
         header("Location: home.php");
		
    }
}
?>

