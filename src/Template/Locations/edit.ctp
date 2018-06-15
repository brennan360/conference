<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $location->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?></li>
		<li><hr></li>
        <li><?= $this->Html->link(__('List Conferences'), ['controller' => 'Conferences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Conference'), ['controller' => 'Conferences', 'action' => 'add']) ?></li>
		<li><hr></li>
        <li><?= $this->Html->link(__('List Location Floorplans'), ['controller' => 'LocationFloorplans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location Floorplan'), ['controller' => 'LocationFloorplans', 'action' => 'add']) ?></li>
		<li><hr></li>
        <li><?= $this->Html->link(__('List Location Room Names'), ['controller' => 'LocationRoomNames', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location Room Name'), ['controller' => 'LocationRoomNames', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="locations form large-9 medium-8 columns content">
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Edit Location') ?></legend>
        <?php
            echo $this->Form->control('location_name');
            echo $this->Form->control('location_address1');
            echo $this->Form->control('location_address2');
            echo $this->Form->control('location_city');
            echo $this->Form->control('state_id', ['options' => $states]);
            echo $this->Form->control('country_id', ['options' => $countries]);
            echo $this->Form->control('location_zipcode');
            echo $this->Form->control('location_phone');
            echo $this->Form->control('location_fax');
            echo $this->Form->control('location_web_address');
            echo $this->Form->control('location_description');
            echo $this->Form->control('location_image');
            echo $this->Form->control('is_active');
            echo $this->Form->control('company_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
