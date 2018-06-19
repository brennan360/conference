<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LocationFloorplan $locationFloorplan
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
                ['action' => 'delete', $locationFloorplan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $locationFloorplan->id)]
            )
        ?></li>
<?php
	}
?>
        <li><?= $this->Html->link(__('List Location Floorplans'), ['action' => 'index']) ?></li>
		<li><hr></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>

    </ul>
</nav>
<div class="locationFloorplans form large-9 medium-8 columns content">
    <?= $this->Form->create($locationFloorplan) ?>
    <fieldset>
        <legend><?= __('Edit Location Floorplan') ?></legend>
				<div class="container" >
			<label for="file">Location Image</label>
            <input type="file" name="file" id="file">
            
            <!-- Drag and Drop container-->
            <div class="upload-area"  id="uploadfile">
				<div class="thumbnail">
					<img src="<?= $locationFloorplan->floorplan_image ?>" alt="floorplan">
				</div>
                <h1>Drag and Drop file here<br/>Or<br/>Click to select file</h1>
            </div>
        </div>

        <?php
            echo $this->Form->hidden('floorplan_image');
            echo $this->Form->control('floorplan_description');
            echo $this->Form->control('is_active');
            echo $this->Form->control('location_id', ['options' => $locations, 'empty' => true]);
            echo $this->Form->hidden('company_id', ['value' => $company_id ]);
            echo $this->Form->hidden('controller', ['value' => 'floorplan' ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
