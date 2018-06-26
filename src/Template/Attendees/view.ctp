<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendee $attendee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attendee'), ['action' => 'edit', $attendee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attendee'), ['action' => 'delete', $attendee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attendees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attendee'), ['action' => 'add']) ?> </li>
        <li><hr></li>
        <li><?= $this->Html->link(__('List Attendee Types'), ['controller' => 'AttendeeTypes', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="attendees view large-9 medium-8 columns content">
    <h3><?= h($attendee->full_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($attendee->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Middle Name') ?></th>
            <td><?= h($attendee->middle_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($attendee->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attendee Type') ?></th>
            <td><?= h( $attendee->has('attendee_type') ? $attendee->attendee_type->description : '') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attendee Website') ?></th>
            <td><?= h($attendee->attendee_website) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= h($attendee->has('company') ? $attendee->company->company_name : '') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($attendee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($attendee->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($attendee->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $attendee->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($attendee->notes)); ?>
    </div>
</div>
