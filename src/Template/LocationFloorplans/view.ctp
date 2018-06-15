<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LocationFloorplan $locationFloorplan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Location Floorplan'), ['action' => 'edit', $locationFloorplan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Location Floorplan'), ['action' => 'delete', $locationFloorplan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationFloorplan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Location Floorplans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location Floorplan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="locationFloorplans view large-9 medium-8 columns content">
    <h3><?= h($locationFloorplan->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Floorplan Image') ?></th>
            <td><?= h($locationFloorplan->floorplan_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $locationFloorplan->has('location') ? $this->Html->link($locationFloorplan->location->id, ['controller' => 'Locations', 'action' => 'view', $locationFloorplan->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($locationFloorplan->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($locationFloorplan->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($locationFloorplan->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $locationFloorplan->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Floorplan Description') ?></h4>
        <?= $this->Text->autoParagraph(h($locationFloorplan->floorplan_description)); ?>
    </div>
</div>
