<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>
			<?php echo Configure::read('TwitterBootstrap.App.name'); ?>
			<?php echo $title_for_layout; ?>
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Le styles -->
		<?php echo $this->Html->css('bootstrap.min'); ?>
		<style>
			body {
				padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
		</style>
		<?php echo $this->Html->css('bootstrap-responsive.min'); ?>
		<?php echo $this->Html->css('bootstrapStickyFooter'); ?>

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le fav and touch icons -->
		<!--
		<link rel="shortcut icon" href="/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
		-->
		<?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
		?>
	</head>

	<body>
		<div id="wrap">
			<div class="navbar navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="brand" href="#"><?= Configure::read('TwitterBootstrap.App.name') ?></a>
						<div class="nav-collapse">
							<?= $this->element('nav_links') ?>
						</div><!--/.nav-collapse -->
					</div>
				</div>
			</div>

			<div class="container">
				<? if ($this->here != '/'): ?>
					<?=
					$this->Html->getCrumbList(array(
					    'class' => 'breadcrumb',
					    'last' => 'active',
					    'separator' => '<li><span class="divider">/</span></li>'
						), 'Home')
					?>
				<? endif; ?>
				<?php echo $this->Session->flash(); ?>

				<?php
				echo $this->Session->flash('auth', array(
				    'element' => 'alert',
				    'params' => array('plugin' => 'TwitterBootstrap'),
				));
				?>
				<?php echo $this->fetch('content'); ?>

			</div> <!-- /container -->
			<div id="push"></div>
		</div>
		<div id="footer">
			<div class="container">
				<p class="muted">
					&copy; <?= Configure::read('TwitterBootstrap.App.name') ?> <?= date('Y') ?> -
					Built using <a target="_top" href="https://github.com/angelxmoreno/CakePHP-FacebookApp">CakePHP FacebookApp</a> and <a target="_top" href="http://cakephp.org">CakePHP</a> and other web goodness
				</p>
			</div>
		</div>
		<!-- Le javascript
	    ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
		<?php echo $this->Html->script('bootstrap.min'); ?>
		<?php echo $this->fetch('script'); ?>

	</body>
</html>
