<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('FacebookUser', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Admin Add %s', __('Facebook User')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('name', array(
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('nickname');
				echo $this->BootstrapForm->input('gender');
				echo $this->BootstrapForm->input('timezone');
				echo $this->BootstrapForm->input('locale');
				echo $this->BootstrapForm->input('email');
				echo $this->BootstrapForm->input('password');
				echo $this->BootstrapForm->input('pic');
				echo $this->BootstrapForm->input('pic_square');
				echo $this->BootstrapForm->input('pic_big');
				echo $this->BootstrapForm->input('is_registered', array(
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('is_admin', array(
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('is_active', array(
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('access_code');
				echo $this->BootstrapForm->input('access_expires');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Facebook Users')), array('action' => 'index'));?></li>
		</ul>
		</div>
	</div>
</div>