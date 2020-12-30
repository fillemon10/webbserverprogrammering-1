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
		$post['username'] = getUsernameById($post['user_id']);
		$post['topic'] = getPostTopic($post['id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
}
// Get posts under a particular topic
if (isset($_GET['topic'])) {
	$topic_id = $_GET['topic'];
	$posts = array_reverse(getPublishedPostsByTopic($topic_id));
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
		$post['username'] = getUsernameById($post['user_id']);
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
	$post['username'] = getUsernameById($post['user_id']);


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
		$review['username'] = getUsernameById($review['user_id']);
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
	$review['username'] = getUsernameById($review['user_id']);

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
// Get posts under a particular type or genre 
if (isset($_GET['type'])) {
	$type = $_GET['type'];
	if ($type == 'movie') {
		$type_id = 0;
		$title = "Movie";
	} else {
		$type_id = 1;
		$title = "Streaming/TV";
	}
	if (isset($_GET['best'])) {
		$best = $_GET['best'];
		if ($best == 1) {
			if ($type == 'movie') {
				$title = "Best Movies";
			} else {
				$title = "Best Streaming/TV";
			}
			$reviews = array_reverse(GetBestReviews($type_id));
		}
	} else {
		$reviews = array_reverse(GetPublishedReviewsByType($type_id));
	}
} elseif (isset($_GET['genre'])) {
	$genre = ucfirst($_GET['genre']);
	$title = $genre;
	$reviews = array_reverse(GetPublishedReviewsByGenre($genre));
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
		$review['username'] = getUsernameById($review['user_id']);

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
		$review['username'] = getUsernameById($review['user_id']);
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
		$review['username'] = getUsernameById($review['user_id']);
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
/* * * * * * * * * * * * * * *
* COMMENT FUNCTIONS
* * * * * * * * * * * * * * */
// if user clicks the  post comment button
if (isset($_POST['comment_post_btn'])) {
	$post = getPost($_GET['post-slug']);
	postComment($_POST, $post['id'], "post");
}
// if user clicks the  review comment button
if (isset($_POST['comment_review_btn'])) {
	$review = getreview($_GET['review-slug']);
	postComment($_POST, $review['id'], "review");
}
//reply to review 
if (isset($_POST['reply_review_btn'])) {
	$comment_id = $_GET['reply-review'];
	postReply($_POST, $comment_id, "review");
}
//reply to post 
if (isset($_POST['reply_post_btn'])) {
	$comment_id = $_GET['reply-post'];
	postReply($_POST, $comment_id, "post");
}
//get all comments from a published post or review
function GetPublishedComments($review_post_id, $table)
{
	global $conn;
	$table_name = $table . "_comments";
	$where = $table . "_id";

	$sql = "SELECT * FROM $table_name WHERE $where='$review_post_id' AND published=true";
	$result = mysqli_query($conn, $sql);
	$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_comments = array();
	foreach ($comments as $comment) {
		$comment["username"] = getUsernameById($comment['user_id']);
		array_push($final_comments, $comment);
	}
	return array_reverse($final_comments);
}
function postComment($request_values, $review_post_id, $table)
{
	global $conn, $text;
	$_SESSION['errors'] = array();
	if (isset($_SESSION['user'])) {

		$table_name = $table . "_comments";
		$text_request = "comment_" . $table . "_text";

		$user = $_SESSION['user']['id'];
		$text = htmlentities(htmlspecialchars($request_values[$text_request]));
		if (empty($text)) {
			array_push($_SESSION['errors'], "Text is required");
		}
		// create comment if there are no errors in the form
		if (count($_SESSION['errors']) == 0) {

			$query = "INSERT INTO $table_name (post_id, user_id, text, created_at, updated_at) 
			VALUES('$review_post_id',
			'$user', 
			'$text', now(), now())";

			mysqli_query($conn, $query);
		}
		unset($_POST);
	} else {
		array_push($_SESSION['errors'], "Login to comment.");
	}
}
function postReply($request_values, $comment_id, $table)
{
	global $conn;
	$_SESSION['errors'] = array();
	if (isset($_SESSION['user'])) {

		$table_name = $table . "_comment_replies";

		$user = $_SESSION['user']['id'];
		$text_request = "reply_" . $table . "_text";
		$text = htmlentities(htmlspecialchars($request_values[$text_request]));
		if (empty($text)) {
			array_push($_SESSION['errors'], "Text is required");
		}

		// create reply if there are no errors in the form
		if (count($_SESSION['errors']) == 0) {

			$query = "INSERT INTO $table_name (comment_id, user_id, text, created_at, updated_at) 
				VALUES('$comment_id',
				'$user', 
				'$text', now(), now())";

			mysqli_query($conn, $query);
			$_SESSION['message'] = "Comment has been sent for review";
		}
		unset($_POST);
	} else {
		array_push($_SESSION['errors'], "Login to comment.");
	}
}
//get replies
function GetPublishedReplies($comment_id, $table)
{
	global $conn;
	$table_name = $table . "_comment_replies";
	$sql = "SELECT * FROM $table_name WHERE comment_id='$comment_id' AND published=true";

	$result = mysqli_query($conn, $sql);
	$replies = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_replies = array();
	foreach ($replies as $reply) {
		$reply["username"] = getUsernameById($reply['user_id']);
		array_push($final_replies, $reply);
	}

	return array_reverse($final_replies);
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
