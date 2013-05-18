<?php
$name = (AuthComponent::user('name')) ? AuthComponent::user('name') : 'Guest';
?>
<a class="btn btn btn-primary">Welcome, <?= $name ?></a>
