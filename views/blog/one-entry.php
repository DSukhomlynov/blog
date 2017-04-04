<?php include ROOT . '/views/layouts/header.php'; ?>

<body>

<section id="page">

	<aside>
		<ul>
			<li><a class="active" href="/title/">Welcome</a></li>
			<li><a class="active" href="/list-of-records/">Forum</a></li>
		</ul>
	</aside>

	<div id="main">
		<p class="logo" id="logotip">My blog</p>

		<div id="show4">
			<h2>Full Version</h2>
		</div>

		<div id="recordings">

			<div class="entry">

				<p class="authorEntry"><?php echo $entryItem['author']; ?></p>
				<p class="dateEntry"><?php echo $entryItem['date']; ?></p>
				<p class="textEntry">
                    <?php echo $entryItem['content']; ?>
				</p>
				<p class="commentsEntry"><?php echo $entryItem['comments']; ?> comments</p>
				<a class="backToForum" href="/list-of-records/">Back to Forum</a>

			</div>

			<div class="comments">
				<h3>Comments:</h3>

                <?php foreach ($entryComment as $CommentUnit): ?>

					<div class="comment">
						<p><?php echo $CommentUnit['author']; ?></p>
						<form id="data"></form>
						<p><?php echo $CommentUnit['comment']; ?></p>
					</div>

                <?php endforeach; ?>
			</div>

			<div class="addComment">
				<h3>Add new comment:</h3>

				<div class="comment">
					<form action="/one-entry/<?php echo $entryItem['id']; ?>/" method="post">
						Name:<input type="text" name="name" autocomplete="off" class="nameForm"><br>
						<p>Text:</p><textarea name="comment" cols="40" rows="4" class="textArea"></textarea><br>
						<input type="submit" value="GO!" name="submit" class="button Com">
					</form>
				</div>

			</div>
		</div>

	</div>

</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
