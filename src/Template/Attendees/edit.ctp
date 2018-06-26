<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendee $attendee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $attendee->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $attendee->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Attendees'), ['action' => 'index']) ?></li>
        <li><hr></li>
        <li><?= $this->Html->link(__('List Attendee Types'), ['controller' => 'AttendeeTypes', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="attendees form large-9 medium-8 columns content">
    <?= $this->Form->create($attendee) ?>
    <fieldset>
        <legend><?= __('Edit Attendee') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('middle_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('attendee_type_id', ['options' => $attendeeTypes]);
            echo $this->Form->control('attendee_website');
            echo $this->Form->control('company_id', ['options' => $companies]);
            echo $this->Form->control('is_active');
            echo $this->Form->control('notes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
