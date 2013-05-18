<?php
$nav_links = array(
    'Home' => '/',
    'About' => array('admin' => false, 'plugin' => null, 'controller' => 'pages', 'action' => 'about'),
    'App Users' => array('admin' => false, 'plugin' => 'facebook_canvas', 'controller' => 'canvas_users', 'action' => 'index'),
    'Test' => array('admin' => false, 'plugin' => null, 'controller' => 'pages', 'action' => 'fb'),
	//'Contact' => array('admin' => false, 'plugin' => null, 'controller' => 'pages', 'action' => 'contact'),
);
/*
if(AuthComponent::user('id')){
        $nav_links['Log Out'] = array('admin' => false, 'plugin' => null, 'controller' => 'users', 'action' => 'logout');
} else {
        $nav_links['Log In'] = array('admin' => false, 'plugin' => null, 'controller' => 'users', 'action' => 'login');
}
 *
 */
?>
<ul class="nav">
        <? foreach($nav_links as $link_name => $link_target): ?>
        <?php
                $_link_target = $this->Html->url($link_target);
                $link_class = ($this->here == $_link_target) ? 'active' : '' ;
        ?>
        <li class="<?=$link_class?>"><a href="<?=$_link_target?>"><?=$link_name?></a></li>
        <? endforeach; ?>
</ul>