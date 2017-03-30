<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8"/>
	<title>Blog</title>
	<link href="/template/css/style.css" rel="stylesheet" type="text/css"/>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>



</head>

<body>
<section id="page">

	<aside>
		<ul>
			<li><a class="active" href="/title/">Welcome</a></li>
			<li><a class="activefix" href="/list_of_records/">Forum</a></li>
		</ul>
	</aside>
	<div id="main">
		<p class="logo" id="logotip">My blog</p>

		<div id="show3">
			<h2>The most popular entries slider</h2>



			<div id="text_slide1">
				<div class="entry2">
				<p class="authorEntry"><?php echo $entryListSortMod[0]['author']; ?></p>

				<p class="dateEntry"><?php echo $entryListSortMod[0]['date']; ?></p>

				<p class="textEntry">
                    <?php
                    $content = mb_substr($entryListSortMod[0]['content'], 0, 100, 'UTF-8') . '...';
                    echo $content; ?>
				</p>

				<p class="commentsEntry"><?php echo $entryListSortMod[0]['comments']; ?> comments</p>

				</div>
			</div>
			<div id="text_slide2">
				<div class="entry2">
					<p class="authorEntry"><?php echo $entryListSortMod[1]['author']; ?></p>

					<p class="dateEntry"><?php echo $entryListSortMod[1]['date']; ?></p>

					<p class="textEntry">
                        <?php
                        $content = mb_substr($entryListSortMod[1]['content'], 0, 100, 'UTF-8') . '...';
                        echo $content; ?>
					</p>

					<p class="commentsEntry"><?php echo $entryListSortMod[1]['comments']; ?> comments</p>

				</div>
			</div>
			<div id="text_slide3">
				<div class="entry2">
					<p class="authorEntry"><?php echo $entryListSortMod[2]['author']; ?></p>

					<p class="dateEntry"><?php echo $entryListSortMod[2]['date']; ?></p>

					<p class="textEntry">
                        <?php
                        $content = mb_substr($entryListSortMod[2]['content'], 0, 100, 'UTF-8') . '...';
                        echo $content; ?>
					</p>

					<p class="commentsEntry"><?php echo $entryListSortMod[2]['comments']; ?> comments</p>

				</div>
			</div>
			<div id="text_slide4">
				<div class="entry2">
					<p class="authorEntry"><?php echo $entryListSortMod[3]['author']; ?></p>

					<p class="dateEntry"><?php echo $entryListSortMod[3]['date']; ?></p>

					<p class="textEntry">
                        <?php
                        $content = mb_substr($entryListSortMod[3]['content'], 0, 100, 'UTF-8') . '...';
                        echo $content; ?>
					</p>

					<p class="commentsEntry"><?php echo $entryListSortMod[3]['comments']; ?> comments</p>

				</div>
			</div>
			<div id="text_slide5">
				<div class="entry2">
					<p class="authorEntry"><?php echo $entryListSortMod[4]['author']; ?></p>

					<p class="dateEntry"><?php echo $entryListSortMod[4]['date']; ?></p>

					<p class="textEntry">
                        <?php
                        $content = mb_substr($entryListSortMod[4]['content'], 0, 100, 'UTF-8') . '...';
                        echo $content; ?>
					</p>

					<p class="commentsEntry"><?php echo $entryListSortMod[4]['comments']; ?> comments</p>

				</div>
			</div>

			<h2 class="indentation">Current Records</h2>
		</div>


		<div class="news" id="news">

            <?php foreach ($entryList as $entryItem): ?>

				<div class="entry">

				<p class="authorEntry"><?php echo $entryItem['author'];?></p>

				<p class="dateEntry"><?php echo $entryItem['date'];?></p>

				<p class="textEntry">
                    <?php
                    $content = mb_substr($entryItem['content'], 0, 100, 'UTF-8') . '...';
                    echo $content;?>
				</p>

				<p class="commentsEntry"><?php echo $entryItem['comments'];?> comments</p>

				<a class="fullEntry" href="/one_entry/<?php echo $entryItem['id'];?>">Full Entry</a>


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



<script src="/template/js/text.js"></script>

<script type="text/javascript">
    var text_slide_cur=0;
    function showtext_slide(){
        $('#text_slide'+(text_slide_cur+1)).css({opacity: 0}).animate({opacity: 1.0,left: "50px"}, 1000);
        setTimeout(hidetext_slide, 3000);
    }
    function hidetext_slide(){
        $('#text_slide'+(text_slide_cur+1)).css({opacity: 1}).animate({opacity: 0,left: "-50px"}, 1000,function(){showtext_slide();});
        text_slide_cur=(text_slide_cur+1)%5;
    }
    $(document).ready(function() {
        showtext_slide();
    }

    )
</script>


</body>

</html>
