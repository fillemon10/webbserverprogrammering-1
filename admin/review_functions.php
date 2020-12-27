<?php
// Review variables
$review_id = 0;
$isEditingReview = false;
$published = 0;
$title = "";
$review_slug = "";
$body = "";
$imdb_id = "";
$our_rating = "";

/* - - - - - - - - - - 
	-
	-  Review actions
	-
	- - - - - - - - - - -*/

// if user clicks the create review button
if (isset($_POST['create_review'])) {
    createReview($_POST);
}

// if user clicks the Edit view button
if (isset($_GET['edit-review'])) {
    $isEditingReview = true;
    $review_id = $_GET['edit-review'];
    editReview($review_id);
}

// if user clicks the update review button
if (isset($_POST['update_review'])) {
    updateReview($_POST);
}

// if user clicks the Delete review button
if (isset($_GET['delete-review'])) {
    $review_id = $_GET['delete-review'];
    deleteReview($review_id);
}
// if user clicks the publish review button
if (isset($_GET['publish']) || isset($_GET['unpublish'])) {
    if (in_array($_SESSION['user']['role'], ["Admin"])) {
        $message = "";
        if (isset($_GET['publish'])) {
            $message = "Review successfully unpublished";
            $review_id = $_GET['publish'];
        } else if (isset($_GET['unpublish'])) {
            $message = "Review published successfully";
            $review_id = $_GET['unpublish'];
        }
        togglePublishReview($review_id, $message);
    } else {
        array_push($errors, "Only admins can publish or unpublish");
    }
}


/* - - - - - - - - - - 
	-
	-  Review functions
	-
	- - - - - - - - - - -*/

// get all reviews from DB
function getAllReviews()
{
    global $conn;
    $sql = "SELECT * FROM reviews";

    $result = mysqli_query($conn, $sql);
    $reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_reviews = array();

    foreach ($reviews as $review) {
        $review['author'] = getReviewAuthorById($review['user_id']);
        array_push($final_reviews, $review);
    }

    return $final_reviews;
}

function createReview($request_values)
{
    global $conn, $errors, $title, $imdb_id, $our_rating, $body, $published, $omdb;
    include("../includes/omdb.php");
    $user = $_SESSION['user']['id'];
    $title = esc($request_values['title']);
    $body = htmlentities(esc($request_values['body']));
    $imdb_id = esc($request_values['imdb_id']);
    $our_rating = esc($request_values['our_rating']);

    // create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
    $review_slug = makeSlug($title);

    // validate form
    if (empty($title)) {
        array_push($errors, "Review title is required");
    }
    // validate form
    if (empty($body)) {
        array_push($errors, "Review body is required");
    }
    // validate form
    if (empty($imdb_id)) {
        array_push($errors, "Review IMDb ID is required");
    }
    if (empty($our_rating)) {
        array_push($errors, "Review rating is required");
    }

    // Ensure that no review is saved twice. 
    $review_check_query = "SELECT * FROM reviews WHERE slug='$review_slug' LIMIT 1";

    $result = mysqli_query($conn, $review_check_query);

    if (mysqli_num_rows($result) > 0) { // if post exists
        array_push($errors, "A review already exists with that title.");
    }

    // create review if there are no errors in the form
    if (count($errors) == 0) {
        $movie = $omdb->get_by_id($imdb_id);
        $movie_poster = $movie["Poster"];
        $movie_title = $movie["Title"];
        $movie_type = $movie["Type"];
        if ($movie_type == "movie") {
            $movie_type_bool = 0;
        } else {
            $movie_type_bool = 1;
        }

        $query = "INSERT INTO reviews (user_id, title, slug, views, imdb_id, our_rating, poster, title_of, type, body, published, created_at, updated_at) 
		VALUES('$user', '$title', '$review_slug', 0, '$imdb_id', '$our_rating', '$movie_poster', '$movie_title', '$movie_type_bool', '$body' , '$published', now(), now())";

        mysqli_query($conn, $query);

        $last_id = $conn->insert_id;

        $movie_genres = $movie["Genre"];
        if (is_array($movie_genres)) {
            foreach ($movie_genres as $movie_genre) {
                $genre_sql = "INSERT INTO review_genres (review_id, genre) VALUES ('$last_id', '$movie_genre')";
                mysqli_query($conn, $genre_sql);
            }
        } else {
            $genre_sql = "INSERT INTO review_genres (review_id, genre) VALUES ('$last_id', '$movie_genres')";
            mysqli_query($conn, $genre_sql);
        }

        $_SESSION['message'] = "Review created successfully";
        header('location: reviews.php');
        exit(0);
    }
}

/* * * * * * * * * * * * * * * * * * * * *
	* - Takes review id as parameter
	* - Fetches the review from database
	* - sets review fields on form for editing
	* * * * * * * * * * * * * * * * * * * * * */
function editReview($review_id)
{
    global $conn, $title, $review_slug, $imdb_id, $body, $our_rating, $isEditingReview, $review_id;

    $sql = "SELECT * FROM reviews WHERE id=$review_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $review = mysqli_fetch_assoc($result);


    // set form values on the form to be updated
    $title = $review['title'];
    $body = $review['body'];
    $imdb_id = $review['imdb_id'];
    $our_rating = $review['our_rating'];
}

function updateReview($request_values)
{
    global $conn, $errors, $review_id, $title, $imdb_id, $our_rating, $body, $published, $omdb;
    $title = esc($request_values['title']);
    $imdb_id = esc($request_values['imdb_id']);
    $our_rating = esc($request_values['our_rating']);
    $body = esc($request_values['body']);
    $review_id = esc($request_values['review_id']);

    if (isset($request_values['topic_id'])) {
        $topic_id = esc($request_values['topic_id']);
    }

    // create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
    $review_slug = makeSlug($title);

    $sql = "SELECT * FROM reviews WHERE id=$review_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $review = mysqli_fetch_assoc($result);

    // validate form
    if (empty($title)) {
        array_push($errors, "Review title is required");
    }
    // validate form
    if (empty($body)) {
        array_push($errors, "Review body is required");
    }
    // validate form
    if (empty($imdb_id)) {
        array_push($errors, "Review IMDb ID can't be changed");
    }
    if (empty($our_rating)) {
        array_push($errors, "Review rating is required");
    }

    // register review if there are no errors in the form
    if (count($errors) == 0) {

        $query = "UPDATE reviews SET title='$title', slug='$review_slug', views=0, imdb_id='$imdb_id', our_rating='$our_rating', body='$body', published=$published, updated_at=now() WHERE id=$review_id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = "Review updated successfully";
        header('location: reviews.php');
        exit(0);
    }
}


// delete blog review
function deleteReview($review_id)
{
    global $conn;
    $sql = "DELETE FROM reviews WHERE id=$review_id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Review successfully deleted";
    }

    header("location: reviews.php");
    exit(0);
}

// delete blog review
function togglePublishReview($review_id, $message)
{
    global $conn;
    $sql = "UPDATE reviews SET published=!published WHERE id=$review_id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = $message;
        header("location: reviews.php");
        exit(0);
    }
}

// get the author/username of a review
function getReviewAuthorById($user_id)
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
