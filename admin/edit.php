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


<h2><a href="">Logout</a></h2>
<h2><a href="view_post.php">View Posts</a></h2>
<h2><a href="insert_post.php">Insert New Posts</a></h2>
<h2><a href="">View Comments</a></h2>

</div>

<?php 
include("../includes/connect.php");

if(isset($_GET['edit'])){

	$edit_id = $_GET['edit'];

	$edit_query = "select * from posts where post_id='$edit_id'";

	$run_edit = mysql_query($edit_query);

	while ($edit_row=mysql_fetch_array($run_edit)){

		$post_id = $edit_row['post_id'];
		$post_title = $edit_row['post_title'];
		$post_author = $edit_row['post_author'];
		$post_keywords = $edit_row['post_keywords'];
		$post_image = $edit_row['post_image'];
		$post_content = $edit_row['post_content'];

	}
}


?>





<form method="post" action="edit.php?edit_form=<?php echo $post_id; ?>" enctype="multipart/form-data">

	<table width="600" align="center" border="10">

		<tr>
			<td align="center" bgcolor="yellow" colspan="6" >
				<h1>Edit post here </h1>
			</td>
		</tr>
		<tr>
			<td align="right">Post Title</td>
			<td><input type="text" name="title" value="<?php echo $post_title; ?>"></td>
		</tr>

		<tr>
			<td align="right">Post Author</td>
			<td><input type="text" name="author" value="<?php echo $post_author; ?>"></td>
		</tr>
		<tr>
			<td align="right">Post Keywords</td>
			<td><input type="text" name="keywords" value="<?php echo $post_keywords; ?>"></td>
		</tr>
		<tr>
			<td align="right">Post Image</td>
			<td><input type="file" name="image">
			<td><img src="../images/<?php echo $post_image; ?>" width="100" height="100"></td>
		</tr>
		<tr>
			<td align="right">Post Conten</td>
			<td><textarea name="content" cols="30" rows="15"  ><?php echo $post_content;?></textarea></td>
		</tr>

		<tr>
			
			<td><input type="submit" name="update" value="Published New"></td>
		</tr>

	</table>
</form>




</body>
</html>

<?php

	if(isset($_POST['update'])){

		$update_id = $_GET['edit_form'];
		$post_title1 = $_POST['title'];
		$post_date1 = date('m-d-y');
		$post_author1 = $_POST['author'];
		$post_keywords1 = $_POST['keywords'];
		$post_content1 = $_POST['content'];
		$post_image1 = $_FILES['image']['name'];
		$image_tmp= $_FILES['image']['tmp_name'];


		if($post_title1=='' or $post_author1=='' or $post_keywords1=='' or $post_content1=='' or $post_image1==''){

			echo "<script>Any of the fields is empty')</script>";
			exit();
		}
		else {
			move_uploaded_file($image_tmp,"../images/$post_image1");

			$update_query = "update posts set post_title='$post_title1', post_date='$post_date1', post_author='$post_author1', post_image='$post_image1', post_keywords='$post_keywords1', post_content='$post_content1' where post_id='$update_id'";

			if(mysql_query($update_query)){
				echo "<script>alert('Post has been updated')</script>";

				echo "<script>window.open('view_post.php', '_self')</script>";

			}
			
		}

	}


?>

