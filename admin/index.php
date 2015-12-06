<?php

session_start();

if(!isset($_SESSION['user_name'])){

		header("location: login.php");
}

else{


?>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" href="style_admin.css" />
</head>
<body>
<div id="header">
	<a href="index.php">
	<h1>Welcome</h1></a>
</div>

<div id="sidebar">
<h2><?php echo $_SESSION['user_name']; ?></h2>

<h2><a href="logout.php">Logout</a></h2>
<h2><a href="view_post.php">View Posts</a></h2>
<h2><a href="index.php?insert=insert">Insert New Posts</a></h2>
<h2><a href="">View Comments</a></h2>

</div>

<div id="welcome">
	<h1>Welcome</h1>
	<p>This is your admin panel, where you can manage your website files and contents</p>
</div>

<?php

	if(isset($_GET['insert'])){
		include("insert_post.php");

	}


?>



</body>
</html>

<?php } ?>