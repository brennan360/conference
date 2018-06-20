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
        <li><?= $this->Html->link(__('Edit Location Room Name'), ['action' => 'edit', $locationRoomName->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Location Room Name'), ['action' => 'delete', $locationRoomName->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationRoomName->id)]) ?> </li>
<?php
	}
?>
		<li><?= $this->Html->link(__('List Location Room Names'), ['action' => 'index']) ?> </li>
<?php
	if ($permissionLevel <= 10)
	{
?>
        <li><?= $this->Html->link(__('New Location Room Name'), ['action' => 'add']) ?> </li>
<?php
	}
?>
		<li><hr></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
<?php
	if ($permissionLevel <= 10)
	{
?>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
<?php
	}
?>
    </ul>
</nav>
<div class="locationRoomNames view large-9 medium-8 columns content">
    <h3><?= h($locationRoomName->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $locationRoomName->has('location') ? $this->Html->link($locationRoomName->location->location_name, ['controller' => 'Locations', 'action' => 'view', $locationRoomName->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Room Name') ?></th>
            <td><?= h($locationRoomName->room_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nickname') ?></th>
            <td><?= h($locationRoomName->nickname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($locationRoomName->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($locationRoomName->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($locationRoomName->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $locationRoomName->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
