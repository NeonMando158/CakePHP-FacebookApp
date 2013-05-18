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
		<div id="fb-root"></div>
		<script>
			window.fbAsyncInit = function() {
				// init the FB JS SDK
				FB.init({
					appId: '380240352094271', // App ID from the app dashboard
					channelUrl: '//cakephp-facebookapp.lianli.lan/fbchannel.php', // Channel file for x-domain comms
					status: true, // Check Facebook Login status
					xfbml: true, // Look for social plugins on the page
					frictionlessRequests: true
				});

				// Additional initialization code such as adding Event Listeners goes here
				// Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
				// for any authentication related change, such as login, logout or session refresh. This means that
				// whenever someone who was previously logged out tries to log in again, the correct case below
				// will be handled.
				FB.Event.subscribe('auth.authResponseChange', function(response) {
					// Here we specify what we do with the response anytime this event occurs.
					if (response.status === 'connected') {
						// the user is logged in and has authenticated your
						// app, and response.authResponse supplies
						// the user's ID, a valid access token, a signed
						// request, and the time the access token
						// and signed request each expire
						var uid = response.authResponse.userID;
						var accessToken = response.authResponse.accessToken;
					} else if (response.status === 'not_authorized') {
						// In this case, the person is logged into Facebook, but not into the app, so we call
						// FB.login() to prompt them to do so.
						// In real-life usage, you wouldn't want to immediately prompt someone to login
						// like this, for two reasons:
						// (1) JavaScript created popup windows are blocked by most browsers unless they
						// result from direct interaction from people using the app (such as a mouse click)
						// (2) it is a bad experience to be continually prompted to login upon page load.
						FB.login();
					} else {
						// In this case, the person is not logged into Facebook, so we call the login()
						// function to prompt them to do so. Note that at this stage there is no indication
						// of whether they are logged into the app. If they aren't then they'll see the Login
						// dialog right after they log in to Facebook.
						// The same caveats as above apply to the FB.login() call here.
						FB.login();
					}
				});
			};

			// Load the SDK asynchronously
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {
					return;
				}
				js = d.createElement(s);
				js.id = id;
				js.src = "//connect.facebook.net/en_US/all.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<div id="wrap">
			<div class="navbar navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="brand" href="/"><?= Configure::read('TwitterBootstrap.App.name') ?></a>
						<div class="nav-collapse">
							<?= $this->element('nav_links') ?>
							<?= $this->element('welcome') ?>
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
