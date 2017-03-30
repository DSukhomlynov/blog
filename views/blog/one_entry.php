<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8"/>
    <title>Blog</title>
	<link href="/template/css/style.css" rel="stylesheet" type="text/css"/>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script src="/template/js/jquery.textillate.js"></script>
    <script src="/template/js/jquery.lettering.js"></script>

</head>

<body>
<section id="page">



    <aside>
        <ul>
	        <li><a class="active" href="/title/">Welcome</a></li>
	        <li><a class="active" href="/list_of_records/">Forum</a></li>
        </ul>
    </aside>
    <div id="main">
        <p class="logo" id="logotip">My blog</p>

	    <div id="show4">
		    <h2>Full Version</h2>
	    </div>



        <div id="news">

            <div class="entry">

                <p class="authorEntry"><?php echo $entryItem['author'];?></p>

                <p class="dateEntry"><?php echo $entryItem['date'];?></p>

                <p class="textEntry">
                    <?php echo $entryItem['content'];?>
                </p>

                <p class="commentsEntry"><?php echo $entryItem['comments'];?> comments</p>

                <a class="backToForum" href="/list_of_records/">Back to Forum</a>

            </div>



            <div class="comments">
                <h3>Comments:</h3>


                <?php foreach ($entryComment as $CommentUnit): ?>

                <div class="comment">
                    <p><?php echo $CommentUnit['author'];?></p>
                    <form id="data"></form>
                    <p><?php echo $CommentUnit['comment'];?></p>
                </div>

                <?php endforeach; ?>


            </div>

            <div class="addComment">
                <h3>Add new comment:</h3>

                <div class="comment">
                    <form action="/one_entry/<?php echo $entryItem['id']; ?>/" method="post">
                        Name:<input type="text" name="name" autocomplete="off" class="nameForm"><br>
                        <p>Text:</p><textarea name="comment" cols="40" rows="4" class="textArea"></textarea><br>
                        <input type="submit" value="GO!" name="submit" class="button Com">
                    </form>
                </div>

            </div>

        </div>



    </div>

</section>

<script src="/template/js/text.js"></script>

</body>

</html>
