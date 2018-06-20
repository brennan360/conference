<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LocationRoomName $locationRoomName
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
<?php
	if ($permissionLevel <= 10)
	{
?>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $locationRoomName->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $locationRoomName->id)]
            )
        ?></li>
<?php
	}
?>
        <li><?= $this->Html->link(__('List Location Room Names'), ['action' => 'index']) ?></li>
		<li><hr></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
<?php
	if ($permissionLevel <= 10)
	{
?>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
<?php
	}
?>
    </ul>
</nav>
<div class="locationRoomNames form large-9 medium-8 columns content">
    <?= $this->Form->create($locationRoomName) ?>
    <fieldset>
        <legend><?= __('Edit Location Room Name') ?></legend>
        <?php
            echo $this->Form->control('location_id', ['options' => $locations]);
            echo $this->Form->control('room_name');
            echo $this->Form->control('nickname');
            echo $this->Form->control('is_active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
