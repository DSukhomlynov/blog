<?php include ROOT . '/views/layouts/header.php'; ?>

<body>

<section id="page">

	<aside>
		<ul>
			<li><a class="active" href="/title/">Welcome</a></li>
			<li><a class="activefix" href="/list-of-records/">Forum</a></li>
		</ul>
	</aside>

	<div id="main">
		<p class="logo" id="logotip">My blog</p>

		<div id="show3">
			<h2>The most popular entries slider</h2>


			<div id="wrapper">
				<div id="slider">
					<div class="inslider">
						<!-- Контейнер контента  -->
						<div class="contentholder">
							<div class="contentslider">

								<div class="content">
									<p class="authorEntry"><?php echo $entryListSort[0]['author']; ?></p>
									<p class="dateEntry"><?php echo $entryListSort[0]['date']; ?></p>
									<p class="textEntry">
                                        <?php
                                        $content = mb_substr($entryListSort[0]['content'], 0, 100, 'UTF-8') . '...';
                                        echo $content; ?>
									</p>
									<p class="commentsEntry"><?php echo $entryListSort[0]['comments']; ?> comments</p>
								</div>
								<div class="content">
									<p class="authorEntry"><?php echo $entryListSort[1]['author']; ?></p>
									<p class="dateEntry"><?php echo $entryListSort[1]['date']; ?></p>
									<p class="textEntry">
                                        <?php
                                        $content = mb_substr($entryListSort[1]['content'], 0, 100, 'UTF-8') . '...';
                                        echo $content; ?>
									</p>
									<p class="commentsEntry"><?php echo $entryListSort[1]['comments']; ?> comments</p>
								</div>
								<div class="content">
									<p class="authorEntry"><?php echo $entryListSort[2]['author']; ?></p>
									<p class="dateEntry"><?php echo $entryListSort[2]['date']; ?></p>
									<p class="textEntry">
                                        <?php
                                        $content = mb_substr($entryListSort[2]['content'], 0, 100, 'UTF-8') . '...';
                                        echo $content; ?>
									</p>
									<p class="commentsEntry"><?php echo $entryListSort[2]['comments']; ?> comments</p>
								</div>
								<div class="content">
									<p class="authorEntry"><?php echo $entryListSort[3]['author']; ?></p>
									<p class="dateEntry"><?php echo $entryListSort[3]['date']; ?></p>
									<p class="textEntry">
                                        <?php
                                        $content = mb_substr($entryListSort[3]['content'], 0, 100, 'UTF-8') . '...';
                                        echo $content; ?>
									</p>
									<p class="commentsEntry"><?php echo $entryListSort[3]['comments']; ?> comments</p>
								</div>
								<div class="content">
									<p class="authorEntry"><?php echo $entryListSort[4]['author']; ?></p>
									<p class="dateEntry"><?php echo $entryListSort[4]['date']; ?></p>
									<p class="textEntry">
                                        <?php
                                        $content = mb_substr($entryListSort[4]['content'], 0, 100, 'UTF-8') . '...';
                                        echo $content; ?>
									</p>
									<p class="commentsEntry"><?php echo $entryListSort[4]['comments']; ?> comments</p>
								</div>
								<div class="content">
								</div>
							</div>
						</div>
						<!-- Навигация  -->
						<div class="contentnav">
							<a rel="1" href="#">1</a>
							<a rel="2" href="#">2</a>
							<a rel="3" href="#">3</a>
							<a rel="4" href="#">4</a>
							<a rel="5" href="#">5</a>
						</div>
					</div>
				</div>
			</div>

			<h2 class="indentation">Current Records</h2>
		</div>


		<div class="recording" id="show4">

            <?php foreach ($entryList as $entryItem): ?>

				<div class="entry">

					<p class="authorEntry"><?php echo $entryItem['author']; ?></p>

					<p class="dateEntry"><?php echo $entryItem['date']; ?></p>

					<p class="textEntry">
                        <?php
                        $content = mb_substr($entryItem['content'], 0, 100, 'UTF-8') . '...';
                        echo $content; ?>
					</p>

					<p class="commentsEntry"><?php echo $entryItem['comments']; ?> comments</p>

					<a class="fullEntry" href="/one-entry/<?php echo $entryItem['id']; ?>">Full Entry</a>

				</div>

            <?php endforeach; ?>

			<div class="addNewEntry" id="show2">

				<h3>Add a new entry:</h3>

				<div class="comment">
					<form action="Page3.html" method="post">
						Name:<input type="text" name="name" autocomplete="off" class="nameForm"><br>
						<p>Text:</p><textarea name="text" cols="40" rows="4" class="textArea"></textarea><br>
						<input type="submit" value="GO!" name="submit" class="button Com">
					</form>
				</div>
			</div>

		</div>

</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
