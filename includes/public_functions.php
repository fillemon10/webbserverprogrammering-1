<?php

/* * * * * * * * * * * * * * *
* Returns all published posts
* * * * * * * * * * * * * * */
function getPublishedPosts()
{
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['username'] = getPostReviewAuthorById($post['user_id']);
		$post['topic'] = getPostTopic($post['id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
}
/* * * * * * * * * * * * * * *
* Receives a post id and
* Returns topic of the post
* * * * * * * * * * * * * * */
function getPostTopic($post_id)
{
	global $conn;
	$sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic;
}
/* * * * * * * * * * * * * * * *
* Returns all posts under a topic
* * * * * * * * * * * * * * * * */
function getPublishedPostsByTopic($topic_id)
{
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id 
				HAVING COUNT(1) = 1)";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']);
		$post['username'] = getPostReviewAuthorById($post['user_id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
}
/* * * * * * * * * * * * * * * *
* Returns topic name by topic id
* * * * * * * * * * * * * * * * */
function getTopicNameById($id)
{
	global $conn;
	$sql = "SELECT name FROM topics WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic['name'];
}
/* * * * * * * * * * * * * * *
* Returns a single post
* * * * * * * * * * * * * * */
function getPost($slug)
{
	global $conn;
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$post_slug' AND published=true";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);

	// get the topic to which this post belongs
	$post['topic'] = getPostTopic($post['id']);
	$post['username'] = getPostReviewAuthorById($post['user_id']);


	return $post;
}
/* * * * * * * * * * * *
*  Returns all topics
* * * * * * * * * * * * */
function getAllTopics()
{
	global $conn;
	$sql = "SELECT * FROM topics";
	$result = mysqli_query($conn, $sql);
	$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $topics;
}
/* * * * * * * * * * * *
*  Shortens string of blog post body
* * * * * * * * * * * * */
function shorten_string($string, $wordsreturned)
{
	$retval = $string;
	$string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $string);
	$string = str_replace("\n", " ", $string);
	$array = explode(" ", $string);
	if (count($array) <= $wordsreturned) {
		$retval = $string;
	} else {
		array_splice($array, $wordsreturned);
		$retval = implode(" ", $array) . "...";
	}
	return $retval;
}

/* * * * * * * * * * * * * * *
* Returns all published reviews
* * * * * * * * * * * * * * */
function getPublishedReviews()
{
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM reviews WHERE published=true";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_reviews = array();
	foreach ($reviews as $review) {
		$review['genres'] = getReviewGenres($review['id']);
		$review['username'] = getPostReviewAuthorById($review['user_id']);
		array_push($final_reviews, $review);
	}
	return $final_reviews;
}
/* * * * * * * * * * * * * * *
* Returns a single review
* * * * * * * * * * * * * * */
function getReview($slug)
{
	global $conn;
	// Get single review slug
	$review_slug = $_GET['review-slug'];
	$sql = "SELECT * FROM reviews WHERE slug='$review_slug' AND published=true";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$review = mysqli_fetch_assoc($result);
	$review['genres'] = getReviewGenres($review['id']);
	$review['username'] = getPostReviewAuthorById($review['user_id']);

	return $review;
}
/* * * * * * * * * * * * * * *
* Returns a reviews genres
* * * * * * * * * * * * * * */
function getReviewGenres($review_id)
{
	global $conn;
	$sql = "SELECT genre FROM review_genres WHERE review_id='$review_id' ";
	$result = mysqli_query($conn, $sql);
	$genres_nested_array = mysqli_fetch_all($result);
	$genres = array();
	foreach ($genres_nested_array as $genre) {
		array_push($genres, $genre[0]);
	}
	return $genres;
}
/* * * * * * * * * * * * * * *
* Returns all published reviews under a type
* * * * * * * * * * * * * * */
function GetPublishedReviewsByType($type_id)
{
	global $conn;
	$sql = "SELECT * FROM reviews WHERE type='$type_id'";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_reviews = array();
	foreach ($reviews as $review) {
		$review['genres'] = getReviewGenres($review['id']);
		$review['username'] = getPostReviewAuthorById($review['user_id']);

		array_push($final_reviews, $review);
	}
	return $final_reviews;
}
/* * * * * * * * * * * * * * *
* Returns all published reviews under a genre
* * * * * * * * * * * * * * */
function GetPublishedReviewsByGenre($genre)
{
	global $conn;
	$sql = "SELECT * FROM reviews WHERE id IN(SELECT review_id FROM review_genres WHERE genre='$genre')";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_reviews = array();
	foreach ($reviews as $review) {
		$review['genres'] = getReviewGenres($review['id']);
		$review['username'] = getPostReviewAuthorById($review['user_id']);
		array_push($final_reviews, $review);
	}
	return $final_reviews;
}
/* * * * * * * * * * * * * * *
* Returns all published reviews under a type and only 10/10
* * * * * * * * * * * * * * */
function getBestReviews($type_id)
{
	global $conn;
	$sql = "SELECT * FROM reviews WHERE our_rating='10' AND type='$type_id'";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$final_reviews = array();
	foreach ($reviews as $review) {
		$review['genres'] = getReviewGenres($review['id']);
		$review['username'] = getPostReviewAuthorById($review['user_id']);
		array_push($final_reviews, $review);
	}
	return $final_reviews;
}
function getAllGenres()
{
	global $conn;
	$sql = "SELECT * FROM review_genres";
	$result = mysqli_query($conn, $sql);
	$genres_nested_array = mysqli_fetch_all($result);
	$genres = array();
	foreach ($genres_nested_array as $genre) {
		array_push($genres, $genre[2]);
	}
	return $genres;
}

// get the author/username of a review/post
function getPostReviewAuthorById($user_id)
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
//get all comments from a published post
function GetPublishedPostComments($post_id)
{
	global $conn;

	$sql = "SELECT * FROM post_comments WHERE post_id='$post_id'";
	$result = mysqli_query($conn, $sql);
	$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_comments = array();
	foreach ($comments as $comment) {
		$comment["username"] = getUsernameById($comment['user_id']);
		array_push($final_comments, $comment);
	}
	return array_reverse($final_comments);
}
// if user clicks the  post comment button
if (isset($_POST['comment_post_btn'])) {
	$post = getPost($_GET['post-slug']);
	postComment($_POST, $post['id']);
}
function postComment($request_values, $post_id)
{
	global $conn, $text;
	$errors = array();
	$user = $_SESSION['user']['id'];
	$text = htmlentities(htmlspecialchars($request_values['comment_post_text']));

	if (empty($text)) {
		array_push($errors, "Text is required");
	}

	// create comment if there are no errors in the form
	if (count($errors) == 0) {

		$query = "INSERT INTO post_comments (post_id, user_id, text, created_at, updated_at) 
			VALUES('$post_id',
			'$user', 
			'$text', now(), now())";

		mysqli_query($conn, $query);
	}
}
// Get user info from user id
function getUsernameById($user_id)
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
//get all comments from a published review
function GetPublishedReviewComments($review_id)
{
	global $conn;

	$sql = "SELECT * FROM review_comments WHERE review_id='$review_id' AND published=true";
	$result = mysqli_query($conn, $sql);
	$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_comments = array();
	foreach ($comments as $comment) {
		$comment["username"] = getUsernameById($comment['user_id']);
		array_push($final_comments, $comment);
	}
	return array_reverse($final_comments);
}
// if user clicks the  review comment button
if (isset($_POST['comment_review_btn'])) {
	$review = getreview($_GET['review-slug']);
	reviewComment($_POST, $review['id']);
	unset($_POST);

}
function reviewComment($request_values, $review_id)
{
	global $conn, $text;
	$errors = array();
	$user = $_SESSION['user']['id'];
	$text = htmlentities(htmlspecialchars($request_values['comment_review_text']));

	if (empty($text)) {
		array_push($errors, "Text is required");
	}

	// create comment if there are no errors in the form
	if (count($errors) == 0) {

		$query = "INSERT INTO review_comments (review_id, user_id, text, created_at, updated_at) 
			VALUES('$review_id',
			'$user', 
			'$text', now(), now())";

		mysqli_query($conn, $query);
		$_SESSION['message'] = "Comment has been sent for review";
	}
}
//reply to review 
if (isset($_POST['reply_review_btn'])) {
	$comment_id = $_GET['reply-review'];
	reviewReply($_POST, $comment_id);
	unset($_POST);
}
function reviewReply($request_values, $comment_id)
{
	global $conn;
	$errors = array();

	$user = $_SESSION['user']['id'];
	$text = htmlentities(htmlspecialchars($request_values['reply_review_text']));
	if (empty($text)) {
		array_push($errors, "Text is required");
	}

	// create reply if there are no errors in the form
	if (count($errors) == 0) {

		$query = "INSERT INTO review_comment_replies (comment_id, user_id, text, created_at, updated_at) 
				VALUES('$comment_id',
				'$user', 
				'$text', now(), now())";

		mysqli_query($conn, $query);
		$_SESSION['message'] = "Comment has been sent for review";
	}

}
//get replies
function GetPublishedReviewreplies($comment_id)
{
	global $conn;

	$sql = "SELECT * FROM review_comment_replies WHERE comment_id='$comment_id' AND published=true";
	$result = mysqli_query($conn, $sql);
	$replies = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_replies = array();
	foreach ($replies as $reply) {
		$reply["username"] = getUsernameById($reply['user_id']);
		array_push($final_replies, $reply);
	}

	return array_reverse($final_replies);
	
}
