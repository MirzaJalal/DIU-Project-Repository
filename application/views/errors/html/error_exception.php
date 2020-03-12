<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');
?>
<style>
	@import url('https://fonts.googleapis.com/css?family=IBM+Plex+Serif|Kalam|Rajdhani&display=swap');

	.wrapper{
		max-width: 1050px;
		min-height: 510px;
		border:2px solid #000;
		margin:0 0 10px 0;
		margin: 20 auto;
		font-family: Lucida Console;
		border-radius: 5px;
		display: none;
	}
	.headline{
		text-align: center;
		font-size: 25px;
	}

	.sub-headline{
		text-align: center;
		font-size: 18px;
		margin: 0px;
		padding: 0px;
	}

	.universal{
		background: #866666;
		color: #fff;
		padding: 20px 0px;
		font-size: 20px;margin: 0px;
		margin: 0px;
	}

	.text-color{color: #ffeb00;}
	.footer-error{
		background: #44da3299;
		margin: 0px;
	}
</style>

<div class="wrapper">

	<h4 class="headline">An uncaught Exception was encountered</h4>
	<p class="sub-headline">Generated On: <?php echo date('h:i:sA, d-m-Y');?></p>

	<p class="universal text-color">Type: <?php echo get_class($exception); ?></p>
	<p class="universal text-color">Message: <?php echo $message; ?></p>
	<p class="universal text-color">Filename: <strong><?php echo $exception->getFile(); ?></strong></p>
	<p class="universal text-color">Line Number: <strong><span style="font-size: 25px;"><?php echo $exception->getLine(); ?></span></strong></p>

	<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

		<div class="footer-error">
			<p>Backtrace:</p>
			<?php foreach ($exception->getTrace() as $error): ?>

				<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

				<p style="margin-left:10px; font-weight: 700">
					File: <?php echo $error['file']; ?><br />
					Line: <?php echo $error['line']; ?><br />
					Function: <?php echo $error['function']; ?>
				</p>
			<?php endif ?>
		</div>

	<?php endforeach ?>

<?php endif ?>

</div>
<script
src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
	$(document).ready(function() {
		setTimeout(function(){
			$('.wrapper').slideDown(300);
		},200);
	});
</script>