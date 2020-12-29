<?php

// if user clicks the publish review comment button
if (isset($_GET['publish_review']) || isset($_GET['unpublish_review'])) {
    $message = "";
    if (isset($_GET['publish_review'])) {
        $message = "Post successfully unpublished";
        $comment_id = $_GET['publish_review'];
    } else if (isset($_GET['unpublish_review'])) {
        $message = "Post published successfully";
        $comment_id = $_GET['unpublish_review'];
    }
    togglePublishComment($comment_id, $message, "review");
}
// if user clicks the publish post comment button
if (isset($_GET['publish_post']) || isset($_GET['unpublish_post'])) {
    $message = "";
    if (isset($_GET['publish_post'])) {
        $message = "Post successfully unpublished";
        $comment_id = $_GET['publish_post'];
    } else if (isset($_GET['unpublish_post'])) {
        $message = "Post published successfully";
        $comment_id = $_GET['unpublish_post'];
    }
    togglePublishComment($comment_id, $message, "review");
}

//get all comments from reviews
function getReviewComments()
{
    global $conn;

    $sql = "SELECT * FROM review_comments";
    $result = mysqli_query($conn, $sql);
    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_comments = array();
    foreach ($comments as $comment) {
        $comment["username"] = getCommentUserById($comment['user_id']);
        $comment['title_of'] = getTitleOf($comment['review_id']);
        $comment['title'] = getTitle($comment['review_id'], "reviews");
        $comment['slug'] = getSlug($comment['review_id'], "reviews");
        array_push($final_comments, $comment);
    }
    return array_reverse($final_comments);
}
//get all comments from posts
function getPostComments()
{
    global $conn;

    $sql = "SELECT * FROM post_comments";
    $result = mysqli_query($conn, $sql);
    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_comments = array();
    foreach ($comments as $comment) {
        $comment["username"] = getCommentUserById($comment['user_id']);
        $comment['title'] = getTitle($comment['post_id'], "posts");
        $comment['slug'] = getSlug($comment['post_id'], "posts");
        array_push($final_comments, $comment);
    }
    return array_reverse($final_comments);
}
//get user from comment
function getCommentUserById($user_id)
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
//get review title of
function getTitleOf($review_id)
{
    global $conn;

    $sql = "SELECT title_of FROM reviews WHERE id=$review_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // return title of
        return mysqli_fetch_assoc($result)['title_of'];
    } else {
        return null;
    }
}
//get review title
function getTitle($id, $table)
{
    global $conn;

    $sql = "SELECT title FROM $table WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // return title of
        return mysqli_fetch_assoc($result)['title'];
    } else {
        return null;
    }
}
function getSlug($id, $table)
{
    global $conn;

    $sql = "SELECT slug FROM $table WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // return username
        return mysqli_fetch_assoc($result)['slug'];
    } else {
        return null;
    }
}
function togglePublishComment($comment_id, $message, $table)
{
    global $conn;
    $table = $table . "_comments";
    $sql = "UPDATE $table SET published=!published WHERE id=$comment_id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = $message;
        header("location: comments");
        exit(0);
    }
}
// if user clicks the Delete review comment button
if (isset($_GET['delete-review-comment'])) {
    $comment_id = $_GET['delete-review-comment'];
    deleteReviewComment($comment_id);
}
// delete blog post
function deleteReviewComment($comment_id)
{
    global $conn;
    $sql = "DELETE FROM review_comments WHERE id=$comment_id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Comment successfully deleted";
        header("location: comments");
        exit(0);
    }
}

// if user clicks the Delete post comment button
if (isset($_GET['delete-post-comment'])) {
    $comment_id = $_GET['delete-post-comment'];
    deletepostComment($comment_id);
}
// delete blog post
function deletepostComment($comment_id)
{
    global $conn;
    $sql = "DELETE FROM post_comments WHERE id=$comment_id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Comment successfully deleted";
        header("location: comments");
        exit(0);
    }
}
function GetReviewReplies($comment_id)
{
    global $conn;

    $sql = "SELECT * FROM review_comment_replies WHERE comment_id='$comment_id'";
    $result = mysqli_query($conn, $sql);
    $replies = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_replies = array();
    foreach ($replies as $reply) {
        $reply["username"] = getCommentUserById($reply['user_id']);
        $reply["reply-to"] = getCommentById($reply['comment_id'], "review_comments");

        array_push($final_replies, $reply);
    }
    return array_reverse($final_replies);
}
function getCommentById($comment_id, $table)
{
    global $conn;

    $sql = "SELECT text FROM $table WHERE id=$comment_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // return title of
        return mysqli_fetch_assoc($result)['text'];
    } else {
        return null;
    }
}
