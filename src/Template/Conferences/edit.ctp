<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conference $conference
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
                ['action' => 'delete', $conference->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $conference->id)]
            )
        ?></li>
<?php
	}
?>
        <li><?= $this->Html->link(__('List Conferences'), ['action' => 'index']) ?></li>
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
<div class="conferences form large-9 medium-8 columns content">
    <?= $this->Form->create($conference) ?>
    <fieldset>
        <legend><?= __('Edit Conference') ?></legend>
		<div class="container" >
			<label for="file">Main Page Image</label>
            <input type="file" name="file" id="file">
            
            <!-- Drag and Drop container-->
            <div class="upload-area" id="uploadfile">
				<img src="<?= $conference->main_page_image ?>" alt="location">
                <h1>Drag and Drop file here<br/>Or<br/>Click to select file</h1>
            </div>
        </div>
		<div class="container1" >
			<label for="file1">Icon Image</label>
            <input type="file1" name="file" id="file1">
            
            <!-- Drag and Drop container-->
            <div class="upload-area1" id="uploadfile1">
				<img src="<?= $conference->icon_image ?>" alt="location">
                <h1>Drag and Drop Icon file here<br/>Or<br/>Click to select file</h1>
            </div>
        </div>
        <?php
            echo $this->Form->control('conference_title');
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->hidden('company_id', ['options' => $companies, 'value' => $company_id]);
            echo $this->Form->control('location_id', ['options' => $locations]);
            echo $this->Form->control('is_active');
            echo $this->Form->control('conference_description');
            echo $this->Form->hidden('main_page_image');
            echo $this->Form->hidden('icon_image');
			echo $this->Form->hidden('controller', ['value' => 'main_page' ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
