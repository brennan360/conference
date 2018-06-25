<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Speaker $speaker
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $speaker->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $speaker->id)]
            )
        ?></li>
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
            echo $this->Form->control('speaker_image');
            echo $this->Form->control('speaker_type_id', ['options' => $speakerTypes]);
            echo $this->Form->control('bio');
            echo $this->Form->control('areas_of_expertise');
            echo $this->Form->control('private_read_and_critique_participant');
            echo $this->Form->control('speaker_website');
            echo $this->Form->control('is_active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>