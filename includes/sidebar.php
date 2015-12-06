<div id="sidebar">

<div id="searchbox">
	<form action="search.php" method="get" enctype="multipart/form-data">
		<input type="text" name="value"  placeholder="Search this site" size="25">
		<input type="submit" name="search" value="Search">
	</form>

</div>


<div id="social">
<h2>Follow Us</h2>
<a href=""><img src="images/facebook.png"></a>
<img src="images/google.png">
<img src="images/twitter.png">

</div>

<div>
Recent Posts
<?php include("../includes/connect.php");

$query = "select * from posts order by 1 DESC LIMIT 0, 5";

	$run = mysql_query($query);

	while ($row=mysql_fetch_array($run)){

		$post_id = $row['post_id'];
		$title = $row['post_title'];
		$image = $row['post_image'];

?>

<center>
	<a href="../includes/pages.php?id=<?php echo $post_id; ?>
	"><h2><?php echo $title; ?></h2></a>
<img src='../images/<?php echo $image; ?>' width='100' height='140'></center>

<?php } ?>





</div>




</div>