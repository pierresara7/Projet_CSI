<?php require 'header.php'; ?>
	<div class="container">
		<div class="row==10 colspan = 200">
		<pre>
				<H1> Bienvenue </H1>
			</pre>
			<?php if($_GET && $_GET['message']): //test si la variable GET est définie ?>
				<div class="span5 alert alert-success"><?php echo $_GET['message'] ?></div>		
			<?php endif ?>

		</div>
	</div>
<?php require 'footer.php'; ?>