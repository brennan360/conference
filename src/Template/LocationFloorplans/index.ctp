<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LocationFloorplan[]|\Cake\Collection\CollectionInterface $locationFloorplans
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
<?php
	if ($permissionLevel <= 10)
	{
?>
		<li><?= $this->Html->link(__('New Location Floorplan'), ['action' => 'add']) ?></li>
		<li><hr></li>
<?php
	}
?>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="locationFloorplans index large-9 medium-8 columns content">
    <h3><?= __('Location Floorplans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('floorplan_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locationFloorplans as $locationFloorplan): ?>
            <tr>
                <td><?= h($locationFloorplan->floorplan_image) ?></td>
                <td><?= $locationFloorplan->has('location') ? $this->Html->link($locationFloorplan->location->location_name, ['controller' => 'Locations', 'action' => 'view', $locationFloorplan->location->id]) : '' ?></td>
                <td><?= h($locationFloorplan->is_active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $locationFloorplan->id]) ?>
<?php
	if ($permissionLevel <= 10)
	{
?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $locationFloorplan->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $locationFloorplan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationFloorplan->id)]) ?>
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
