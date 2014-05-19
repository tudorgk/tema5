<?php

include('config.php');
include('function.php');
dbConnect();

$post_id = $_GET['postid'];

//create the query
$comment_query = mysql_query(
    "SELECT *
			FROM comment
			WHERE post_id = {$post_id}
			ORDER BY id ASC");
?>

<?php if ($comment_query): ?>
    <?php while($comment = mysql_fetch_array($comment_query)): ?>
        <div class="comment-item">
            <div class="comment-avatar">
                <img src="<?php echo avatar($comment['mail']) ?>" alt="avatar">
            </div>
            <div class="comment-post">
                <h3><?php echo $comment['name'] ?>:</h3>
                <p><?php echo $comment['comment']?></p>
            </div>
        </div>
    <?php endwhile?>

<?php
    dbConnect(0);
endif?>