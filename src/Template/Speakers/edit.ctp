<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Speaker $speaker
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
                ['action' => 'delete', $speaker->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $speaker->id)]
            )
        ?></li>
<?php
	}
?>
        <li><?= $this->Html->link(__('List Speakers'), ['action' => 'index']) ?></li>
        <li><hr></li>
        <li><?= $this->Html->link(__('List Speaker Types'), ['controller' => 'SpeakerTypes', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="speakers form large-9 medium-8 columns content">
    <?= $this->Form->create($speaker) ?>
    <fieldset>
        <legend><?= __('Edit Speaker') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            if ($permissionLevel == 0) {
                echo $this->Form->control('company_id', ['options' => $companies]);
            } else {
               echo $this->Form->hidden('company_id', ['value' => $company_id]); 
            }
        ?>
            <div class="input text required">
                <label for="speaker-image">Speaker Image</label>
            </div>
            <div class="container" >

                <input type="file" name="file" id="file">

                <!-- Drag and Drop container-->
                <div class="upload-area"  id="uploadfile">
                    <div class="thumbnail">
					<img src="<?= $speaker->speaker_image ?>" alt="$speaker->full_name">
				</div><h1>Drag and Drop file here<br/>Or<br/>Click to select file</h1>
                </div>
            </div><br />
        <?php
            echo $this->Form->control('speaker_type_id', ['options' => $speakerTypes]);
            echo $this->Form->control('bio');
            echo $this->Form->control('areas_of_expertise');
            echo $this->Form->control('speaker_website');
            echo $this->Form->control('private_read_and_critique_participant');
            echo $this->Form->control('is_active');
            echo $this->Form->hidden('speaker_image');
			echo $this->Form->hidden('controller', ['value' => 'speaker' ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
