<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <link rel="stylesheet" href="css/style.css">

        <script src="js/script.js"></script>
    </head>
<body>
<div class="wrap">
    <h1>Tema 5 PW - AJAX Comment System</h1>
    <?php

    session_start();
    include('config.php');
    include ('function.php');
    dbConnect();

    if(!isset($_GET['page'])){
        die('Please input a page id! Usage: http://localhost/index.php?page={page_id}');
    }

    $query = mysql_query(
        "SELECT *
        FROM post
        WHERE post_id = {$_GET['page']}");
    $row = mysql_fetch_array($query);

    $_SESSION['row'] = $row;
    ?>
    <div class="post">
        <h2><?php echo $_SESSION['row']['post_title']?></h2>
        <p><?php echo $_SESSION['row']['post_body']?></p>
    </div>

    <!--  get the comments-->
    <h2>Comments</h2>
    <div class="comment-block">
        <?php
        $post_id =$_SESSION['row']['post_id'];
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
        <?php endif?>
    </div>


    <h2>Submit new comment</h2>
    <!--comment form -->
    <form id="form" method="post">
        <!-- need to supply post id with hidden field -->
        <input id="hidden-input" type="hidden" name="postid" value="<?php echo $_SESSION['row']['post_id']?>">
        <label>
            <span>Name *</span>
            <input type="text" name="name" id="comment-name" placeholder="Your name here...." required>
        </label>
        <label>
            <span>Email *</span>
            <input type="email" name="mail" id="comment-mail" placeholder="Your mail here...." required>
        </label>
        <label>
            <span>Your comment *</span>
            <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Type your comment here...." required></textarea>
        </label>
        <input type="submit" id="submit" value="Submit Comment">
    </form>
</div>
</body>
</html>
