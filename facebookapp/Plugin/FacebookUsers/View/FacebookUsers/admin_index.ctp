<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Facebook Users'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('name');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('nickname');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('gender');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('timezone');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('locale');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('email');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('password');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('pic');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('pic_square');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('pic_big');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('is_registered');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('is_admin');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('is_active');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('access_code');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('access_expires');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('created');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('modified');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($facebookUsers as $facebookUser): ?>
			<tr>
				<td><?php echo h($facebookUser['FacebookUser']['id']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['name']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['nickname']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['gender']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['timezone']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['locale']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['email']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['password']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['pic']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['pic_square']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['pic_big']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['is_registered']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['is_admin']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['is_active']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['access_code']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['access_expires']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['created']); ?>&nbsp;</td>
				<td><?php echo h($facebookUser['FacebookUser']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $facebookUser['FacebookUser']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $facebookUser['FacebookUser']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $facebookUser['FacebookUser']['id']), null, __('Are you sure you want to delete # %s?', $facebookUser['FacebookUser']['id'])); ?>
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
			<li><?php echo $this->Html->link(__('New %s', __('Facebook User')), array('action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>