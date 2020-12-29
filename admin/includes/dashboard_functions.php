<?php 
// Count all rows in published reviews
function countPublishedReviews()
{
    global $conn;
	$sql = "SELECT * FROM reviews WHERE published='1'";

	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);

	return $count;
}
function countPublishedPosts()
{
    global $conn;
	$sql = "SELECT * FROM posts WHERE published='1'";

	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);

	return $count;
}
function countUsers()
{
    global $conn;
	$sql = "SELECT * FROM users";

	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);

	return $count;
}
function countAdminUsers()
{
    global $conn;
	$sql = "SELECT * FROM users WHERE role='Admin'";

	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);

	return $count;
}
function countComments(){
    global $conn;
	$sql = "SELECT * FROM review_comments";

	$result = mysqli_query($conn, $sql);
	$review_count = mysqli_num_rows($result);

	$sql= "SELECT * FROM post_comments";

	$result = mysqli_query($conn, $sql);
	$count = $review_count +mysqli_num_rows($result);
	return $count;
}
function countNewUsers(){
    
}