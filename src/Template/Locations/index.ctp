<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location[]|\Cake\Collection\CollectionInterface $locations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
<?php
	if ($permissionLevel <= 10)
	{
?>
        <li><?= $this->Html->link(__('New Location'), ['action' => 'add']) ?></li>
<?php
	}
?>
		<li><hr></li>
        <li><?= $this->Html->link(__('List Conferences'), ['controller' => 'Conferences', 'action' => 'index']) ?></li>
<?php
	if ($permissionLevel <= 10)
	{
?>
        <li><?= $this->Html->link(__('New Conference'), ['controller' => 'Conferences', 'action' => 'add']) ?></li>
<?php
	}
?>
        <li><hr></li>
		<li><?= $this->Html->link(__('List Location Floorplans'), ['controller' => 'LocationFloorplans', 'action' => 'index']) ?></li>
<?php
	if ($permissionLevel <= 10)
	{
?>
        <li><?= $this->Html->link(__('New Location Floorplan'), ['controller' => 'LocationFloorplans', 'action' => 'add']) ?></li>
<?php
	}
?>
        <li><hr></li>
		<li><?= $this->Html->link(__('List Location Room Names'), ['controller' => 'LocationRoomNames', 'action' => 'index']) ?></li>
<?php
	if ($permissionLevel <= 10)
	{
?>
        <li><?= $this->Html->link(__('New Location Room Name'), ['controller' => 'LocationRoomNames', 'action' => 'add']) ?></li>
<?php
	}
?>
    </ul>
</nav>
<div class="locations index large-9 medium-8 columns content">
    <h3><?= __('Locations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('location_name') ?></th>
				<th scope="col"><?= __('location Image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locations as $location): ?>
            <tr>
                <td><?= h($location->location_name) ?></td>
				<td><?php echo $this->Html->image($location->location_image, array('style' => 'max-height:50px;','alt'=>'location')); ?></td>
                <td><?= h($location->is_active) == 1 ? 'yes':'no' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $location->id]) ?>
<?php
	if ($permissionLevel <= 10)
	{
?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $location->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?>
<?php
	}
?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
