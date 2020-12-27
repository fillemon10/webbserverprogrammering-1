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
	if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['id']);
	}
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
		array_push($final_reviews, $review);
	}
	return $final_reviews;
}
/* * * * * * * * * * * * * * *
* Returns all published reviews under a type and only 10/10
* * * * * * * * * * * * * * */
function getBestReviews($type_id) {
	global $conn;
	$sql = "SELECT * FROM reviews WHERE our_rating='10' AND type='$type_id'";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$final_reviews = array();
	foreach ($reviews as $review) {
		$review['genres'] = getReviewGenres($review['id']);
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

