<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Canvas User');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($canvasUser['CanvasUser']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($canvasUser['CanvasUser']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Username'); ?></dt>
			<dd>
				<?php echo h($canvasUser['CanvasUser']['username']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Gender'); ?></dt>
			<dd>
				<?php echo h($canvasUser['CanvasUser']['gender']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Timezone'); ?></dt>
			<dd>
				<?php echo h($canvasUser['CanvasUser']['timezone']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Locale'); ?></dt>
			<dd>
				<?php echo h($canvasUser['CanvasUser']['locale']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Email'); ?></dt>
			<dd>
				<?php echo h($canvasUser['CanvasUser']['email']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Is Registered'); ?></dt>
			<dd>
				<?php echo h($canvasUser['CanvasUser']['is_registered']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Is Admin'); ?></dt>
			<dd>
				<?php echo h($canvasUser['CanvasUser']['is_admin']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Is Active'); ?></dt>
			<dd>
				<?php echo h($canvasUser['CanvasUser']['is_active']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Access Token'); ?></dt>
			<dd>
				<?php echo h($canvasUser['CanvasUser']['access_token']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($canvasUser['CanvasUser']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($canvasUser['CanvasUser']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Canvas User')), array('action' => 'edit', $canvasUser['CanvasUser']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Canvas User')), array('action' => 'delete', $canvasUser['CanvasUser']['id']), null, __('Are you sure you want to delete # %s?', $canvasUser['CanvasUser']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Canvas Users')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Canvas User')), array('action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

