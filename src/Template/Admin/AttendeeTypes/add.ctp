<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttendeeType $attendeeType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Attendee Types'), ['action' => 'index']) ?></li>
        <li><hr></li>
        <li><?= $this->Html->link(__('List Attendees'), '/attendees/index') ?></li>
        <li><?= $this->Html->link(__('New Attendee'), '/attendees/add') ?></li>
    </ul>
</nav>
<div class="attendeeTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($attendeeType) ?>
    <fieldset>
        <legend><?= __('Add Attendee Type') ?></legend>
        <?php
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
