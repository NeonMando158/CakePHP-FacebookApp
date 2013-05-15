<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Facebook User');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Nickname'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['nickname']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Gender'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['gender']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Timezone'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['timezone']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Locale'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['locale']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Email'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['email']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Password'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['password']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Pic'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['pic']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Pic Square'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['pic_square']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Pic Big'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['pic_big']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Is Registered'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['is_registered']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Is Admin'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['is_admin']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Is Active'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['is_active']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Access Code'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['access_code']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Access Expires'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['access_expires']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($facebookUser['FacebookUser']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Facebook User')), array('action' => 'edit', $facebookUser['FacebookUser']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Facebook User')), array('action' => 'delete', $facebookUser['FacebookUser']['id']), null, __('Are you sure you want to delete # %s?', $facebookUser['FacebookUser']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Facebook Users')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Facebook User')), array('action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

