<?php

// Post variables
$post_id = 0;
$isEditingPost = false;
$published = 0;
$title = "";
$post_slug = "";
$body = "";
$image = "";
$post_topic = "";

/* - - - - - - - - - - 
	-
	-  Post actions
	-
	- - - - - - - - - - -*/

// if user clicks the create post button
if (isset($_POST['create_post'])) {
	createPost($_POST);
	unset($_POST);
}

// if user clicks the Edit post button
if (isset($_GET['edit-post'])) {
	$isEditingPost = true;
	$post_id = $_GET['edit-post'];
	editPost($post_id);
}

// if user clicks the update post button
if (isset($_POST['update_post'])) {
	updatePost($_POST);
	unset($_POST);
}

// if user clicks the Delete post button
if (isset($_GET['delete-post'])) {
	$post_id = $_GET['delete-post'];
	deletePost($post_id);
}
// if user clicks the publish post button
if (isset($_GET['publish']) || isset($_GET['unpublish'])) {
	if ($_SESSION['user']['role'] == "Admin") {

		$message = "";
		if (isset($_GET['publish'])) {
			$message = "Post successfully unpublished";
			$post_id = $_GET['publish'];
		} else if (isset($_GET['unpublish'])) {
			$message = "Post published successfully";
			$post_id = $_GET['unpublish'];
		}
		togglePublishPost($post_id, $message);
	} else {
		array_push($_SESSION['errors'], "Only admins can publish or unpublish");
	}
}


/* - - - - - - - - - - 
	-
	-  Post functions
	-
	- - - - - - - - - - -*/

// get all posts from DB
function getAllPosts()
{
	global $conn;
	$sql = "SELECT * FROM posts";

	$result = mysqli_query($conn, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();

	foreach ($posts as $post) {
		$post['author'] = getPostAuthorById($post['user_id']);
		array_push($final_posts, $post);
	}

	return $final_posts;
}

function createPost($request_values)
{
	global $conn, $title, $image, $topic_id, $body, $published;
	$user = $_SESSION['user']['id'];
	$title = esc($request_values['title']);
	$body = htmlentities(esc($request_values['body']));
	$image = esc($request_values['image']);

	if (isset($request_values['topic_id'])) {
		$topic_id = esc($request_values['topic_id']);
	}

	// create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
	$post_slug = makeSlug($title);

	// validate form
	if (empty($title)) {
		array_push($_SESSION['errors'], "Post title is required");
	}

	// validate form
	if (empty($body)) {
		array_push($_SESSION['errors'], "Post body is required");
	}
	// validate form
	if (empty($topic_id)) {
		array_push($_SESSION['errors'], "Post topic is required");
	}
	if (empty($image)) {
		array_push($_SESSION['errors'], "Image URL is required");
	}

	// Ensure that no post is saved twice. 
	$post_check_query = "SELECT * FROM posts WHERE slug='$post_slug' LIMIT 1";

	$result = mysqli_query($conn, $post_check_query);

	if (mysqli_num_rows($result) > 0) { // if post exists
		array_push($_SESSION['errors'], "A post already exists with that title.");
	}

	// create post if there are no errors in the form
	if (count($_SESSION['errors']) == 0) {
		$query = "INSERT INTO posts (user_id, title, slug, views, image, body, published, created_at, updated_at) 
		VALUES('$user', '$title', '$post_slug', 0, '$image', '$body', $published, now(), now())";

		mysqli_query($conn, $query);

		if (isset($topic_id)) {
			$last_id = $conn->insert_id;
			$topic_sql = "INSERT INTO post_topic (post_id, topic_id) VALUES ($last_id, $topic_id)";
			mysqli_query($conn, $topic_sql);
		}
		$_SESSION['message'] = "Post created successfully";
		header('location: posts');
		exit(0);
	}
}

/* * * * * * * * * * * * * * * * * * * * *
	* - Takes post id as parameter
	* - Fetches the post from database
	* - sets post fields on form for editing
	* * * * * * * * * * * * * * * * * * * * * */
function editPost($role_id)
{
	global $conn, $title, $post_slug, $body, $image, $isEditingPost, $post_id, $topic_id;

	$sql = "SELECT * FROM posts WHERE id=$role_id LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$post = mysqli_fetch_assoc($result);

	// set form values on the form to be updated
	$title = $post['title'];
	$body = $post['body'];
	$image = $post['image'];
}

function updatePost($request_values)
{
	global $conn, $post_id, $title, $image, $topic_id, $body, $published;
	$title = esc($request_values['title']);
	$image = esc($request_values['image']);
	$body = esc($request_values['body']);
	$post_id = esc($request_values['post_id']);

	if (isset($request_values['topic_id'])) {
		$topic_id = esc($request_values['topic_id']);
	}

	// create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
	$post_slug = makeSlug($title);

	// validate form
	if (empty($title)) {
		array_push($_SESSION['errors'], "Post title is required");
	}
	// validate form
	if (empty($body)) {
		array_push($_SESSION['errors'], "Post body is required");
	}
	// validate form
	if (empty($topic_id)) {
		array_push($_SESSION['errors'], "Post topic is required");
	}
	if (empty($image)) {
		array_push($_SESSION['errors'], "Image URL is required");
	}

	// register topic if there are no errors in the form
	if (count($_SESSION['errors']) == 0) {
		$query = "UPDATE posts SET title='$title', slug='$post_slug', views=0, image='$image', body='$body', published=$published, updated_at=now() WHERE id=$post_id";

		mysqli_query($conn, $query);

		$topic_sql = "UPDATE post_topic SET topic_id='$topic_id' WHERE post_id='$post_id'";
		mysqli_query($conn, $topic_sql);

		$_SESSION['message'] = "Post updated successfully";
		header('location: posts');
		exit(0);
	}
}


// delete blog post
function deletePost($post_id)
{
	global $conn;
	$sql = "DELETE FROM posts WHERE id=$post_id";

	if (mysqli_query($conn, $sql)) {
		$_SESSION['message'] = "Post successfully deleted";
		header("location: posts");
		exit(0);
	}
}

// toggle published blog post
function togglePublishPost($post_id, $message)
{
	global $conn;
	$sql = "UPDATE posts SET published=!published WHERE id=$post_id";

	if (mysqli_query($conn, $sql)) {
		$_SESSION['message'] = $message;
		header("location: posts");
		exit(0);
	}
}

// get the author/username of a post
function getPostAuthorById($user_id)
{
	global $conn;

	$sql = "SELECT username FROM users WHERE id=$user_id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		// return username
		return mysqli_fetch_assoc($result)['username'];
	} else {
		return null;
	}
}
