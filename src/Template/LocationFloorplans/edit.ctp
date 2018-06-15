<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LocationFloorplan $locationFloorplan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $locationFloorplan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $locationFloorplan->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Location Floorplans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="locationFloorplans form large-9 medium-8 columns content">
    <?= $this->Form->create($locationFloorplan) ?>
    <fieldset>
        <legend><?= __('Edit Location Floorplan') ?></legend>
        <?php
            echo $this->Form->control('floorplan_image');
            echo $this->Form->control('floorplan_description');
            echo $this->Form->control('is_active');
            echo $this->Form->control('location_id', ['options' => $locations, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
