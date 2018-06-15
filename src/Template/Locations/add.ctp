<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?></li>
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
<div class="locations form large-9 medium-8 columns content">
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Add Location') ?></legend>
		<div class="container" >
			<label for="file">Location Image</label>
            <input type="file" name="file" id="file">
            
            <!-- Drag and Drop container-->
            <div class="upload-area"  id="uploadfile">
                <h1>Drag and Drop file here<br/>Or<br/>Click to select file</h1>
            </div>
        </div>
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
            echo $this->Form->hidden('location_image');
            echo $this->Form->control('is_active');
            echo $this->Form->hidden('company_id', ['value' => $company_id ]);
            echo $this->Form->hidden('controller', ['value' => 'locations' ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
