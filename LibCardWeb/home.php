<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
	$dbcon = mysqli_select_db($conn,DBNAME);

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: login.php");
		exit;
	}
	// select loggedin users detail
	$res=mysqli_query($conn,"SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LibCard</title>
 <link rel="icon" type="image/jpg" href="img/logo_libcard.jpg">
  <?php echo $userRow['userName']; ?>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a class="navbar-brand" href="index.html">Book</a></li>
            <li><a class="navbar-brand" href="index.html">Author</a></li>
            <li><a class="navbar-brand" href="index.html">Title</a></li>
            <LI><a class="navbar-brand" href="index.html">ISBN</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['userName']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
           <li><a href="upload.html"><span class="glyphicon glyphicon-user"></span>&nbsp;Profile</a></li>
              
            <li><a href="index.html"><span class="glyphicon glyphicon-home"></span>&nbsp;Home Page</a></li>
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Log Out</a></li>
                
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

	<div id="wrapper">

	<div class="container">
    
    	<div class="page-header" >
    	<h3>Book List  
    	
    	
      
    	        <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>	
    	<div>
    	<input type="text" name="search" placeholder="Search...">
    	</div>
		</div>
</div>
</h3>
<!--style> 
input[type=text] {
    width: 130px;
    margin-left: 3px;	
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 50%;
}
</style-->

    	</div>
        
        <div class="row">
        <div class="col-lg-12">
        <div align="center">
				<marquee 
			
   				  direction="left"
   				  loop="7"
     			   scrollamount="1"
     				scrolldelay="1"
    				 behavior="alternate"
    				 width="100%">
    				<font size="7" color="purple">Book List Will Be Live Soon...</font>
			</marquee>
</div>
        </div>
        </div>
    
    </div>
    
    </div>
    <div id="footer">
  <div class="container">
  <p style="text-align:center;">
	<span style="text-align:center;float:center">&copy;Copyright © 2017 <a href="https://www.facebook.com/errajrahul" alt="LibCard_Dashboard">LibCard</a>  All Rights Reserved.</span>
	<span style="text-align:center;float:center center">Designed & Maintain By- Rahul Raj</span>
					
		</p>
</div>
</div>

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>