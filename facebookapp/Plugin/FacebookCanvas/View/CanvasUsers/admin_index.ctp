<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Canvas Users'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('name');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('username');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('gender');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('timezone');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('locale');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('email');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('is_registered');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('is_admin');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('is_active');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('access_token');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('created');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('modified');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($canvasUsers as $canvasUser): ?>
			<tr>
				<td><?php echo h($canvasUser['CanvasUser']['id']); ?>&nbsp;</td>
				<td><?php echo h($canvasUser['CanvasUser']['name']); ?>&nbsp;</td>
				<td><?php echo h($canvasUser['CanvasUser']['username']); ?>&nbsp;</td>
				<td><?php echo h($canvasUser['CanvasUser']['gender']); ?>&nbsp;</td>
				<td><?php echo h($canvasUser['CanvasUser']['timezone']); ?>&nbsp;</td>
				<td><?php echo h($canvasUser['CanvasUser']['locale']); ?>&nbsp;</td>
				<td><?php echo h($canvasUser['CanvasUser']['email']); ?>&nbsp;</td>
				<td><?php echo h($canvasUser['CanvasUser']['is_registered']); ?>&nbsp;</td>
				<td><?php echo h($canvasUser['CanvasUser']['is_admin']); ?>&nbsp;</td>
				<td><?php echo h($canvasUser['CanvasUser']['is_active']); ?>&nbsp;</td>
				<td><?php echo h($canvasUser['CanvasUser']['access_token']); ?>&nbsp;</td>
				<td><?php echo h($canvasUser['CanvasUser']['created']); ?>&nbsp;</td>
				<td><?php echo h($canvasUser['CanvasUser']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $canvasUser['CanvasUser']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $canvasUser['CanvasUser']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $canvasUser['CanvasUser']['id']), null, __('Are you sure you want to delete # %s?', $canvasUser['CanvasUser']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->BootstrapPaginator->pagination(); ?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Canvas User')), array('action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>