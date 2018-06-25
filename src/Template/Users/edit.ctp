<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
<?php
	if ($permissionLevel <= 10)
	{
?>
		<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
<?php
	}
?>
	</ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
<?php
	if ($permissionLevel <= 10)
	{
?>
        <legend><?= __('Edit User for ') . $company_name;  ?></legend>
<?php
	}
	else
	{
?>
		<legend><?= $user->first_name . ' ' . $user->last_name; ?></legend>
<?php
	}
?>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('email');

			if ($permissionLevel <= 10)
			{
            	echo $this->Form->control('is_active');
            	echo $this->Form->control('company_id', ['options' => $companies]);
            	echo $this->Form->control('permission_id', ['options' => $permissions]);
			}
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
