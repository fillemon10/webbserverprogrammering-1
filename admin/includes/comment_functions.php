<?php

// if user clicks the publish review comment button
if (isset($_GET['publish_review']) || isset($_GET['unpublish_review'])) {
    togglePublishCommentPre("review");
}
// if user clicks the publish post comment button
if (isset($_GET['publish_post']) || isset($_GET['unpublish_post'])) {
    togglePublishCommentPre("post");
}
// if user clicks the publish post comment button
if (isset($_GET['publish_reply_review']) || isset($_GET['unpublish_reply_review'])) {
    togglePublishReplyPre("review");
}
// if user clicks the publish post comment button
if (isset($_GET['publish_reply_post']) || isset($_GET['unpublish_reply_post'])) {
    togglePublishReplyPre("post");
}
function togglePublishCommentPre($type)
{
    $message = "";
    if (isset($_GET['publish_' . $type])) {
        $message = ucfirst($type) . " comment successfully unpublished";
        $comment_id = $_GET['publish' . $type];
    } else if (isset($_GET['unpublish_' . $type])) {
        $message = ucfirst($type) . " comment published successfully";
        $comment_id = $_GET['unpublish_' . $type];
    }
    togglePublishComment($comment_id, $message, $type);
}
function togglePublishReplyPre($type)
{
    $message = "";
    if (isset($_GET['publish_reply_' . $type])) {
        $message = ucfirst($type) . " reply successfully unpublished";
        $reply_id = $_GET['publish_reply_' . $type];
    } else if (isset($_GET['unpublish_reply_' . $type])) {
        $message = ucfirst($type) . " reply published successfully";
        $reply_id = $_GET['unpublish_reply_' . $type];
    }
    togglePublishReply($reply_id, $message, $type);
}
//get all comments from reviews
function getComments($table)
{
    global $conn;
    $table_name = $table . "_comments";
    $post_or_review_id = $table . "_id";

    $sql = "SELECT * FROM $table_name";
    $result = mysqli_query($conn, $sql);
    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_comments = array();
    foreach ($comments as $comment) {
        $comment["username"] = getCommentUserById($comment['user_id']);
        if ($table == "review") {
            $comment['title_of'] = getTitleOf($comment['review_id']);
        }
        $comment['title'] = getTitle($comment[$post_or_review_id], $table . "s");
        $comment['slug'] = getSlug($comment[$post_or_review_id], $table . "s");
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
function togglePublishReply($reply_id, $message, $table)
{
    global $conn;
    $table = $table . "_comment_replies";
    $sql = "UPDATE $table SET published=!published WHERE id=$reply_id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = $message;
        header("location: comments");
        exit(0);
    }
}
// if user clicks the Delete review comment button
if (isset($_GET['delete-comment-review'])) {
    $comment_id = $_GET['delete-comment-review'];
    deleteComment($comment_id, "review");
}
// if user clicks the Delete post comment button
if (isset($_GET['delete-comment-post'])) {
    $comment_id = $_GET['delete-comment-post'];
    deleteComment($comment_id, "post");
}
// if user clicks the Delete review comment button
if (isset($_GET['delete-reply-review'])) {
    $reply_id = $_GET['delete-reply-review'];
    deleteReply($reply_id, "review");
}
// if user clicks the Delete review comment button
if (isset($_GET['delete-reply-post'])) {
    $reply_id = $_GET['delete-reply-post'];
    deleteReply($reply_id, "post");
}
// delete comment
function deleteComment($comment_id, $table)
{
    global $conn;
    $table_name = $table . "_comments";
    $sql = "DELETE FROM $table_name WHERE id=$comment_id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Comment successfully deleted";
        header("location: comments");
        exit(0);
    }
}
// delete reply
function deleteReply($reply_id, $table)
{
    global $conn;
    $table_name = $table . "_comment_replies";
    $sql = "DELETE FROM $table_name WHERE id=$reply_id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Reply successfully deleted";
        header("location: comments");
        exit(0);
    }
}
function GetReplies($comment_id, $table)
{
    global $conn;
    $table_name = $table . "_comment_replies";

    $sql = "SELECT * FROM $table_name WHERE comment_id='$comment_id'";
    $result = mysqli_query($conn, $sql);
    $replies = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_replies = array();
    foreach ($replies as $reply) {
        $reply["username"] = getCommentUserById($reply['user_id']);

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
