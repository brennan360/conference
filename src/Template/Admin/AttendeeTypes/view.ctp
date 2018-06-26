<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttendeeType $attendeeType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attendee Type'), ['action' => 'edit', $attendeeType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attendee Type'), ['action' => 'delete', $attendeeType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendeeType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attendee Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attendee Type'), ['action' => 'add']) ?> </li>
        <li><hr></li>
        <li><?= $this->Html->link(__('List Attendees'), '/attendees/index') ?> </li>
        <li><?= $this->Html->link(__('New Attendee'), '/attendees/add') ?> </li>
    </ul>
</nav>
<div class="attendeeTypes view large-9 medium-8 columns content">
    <h3><?= h($attendeeType->description) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($attendeeType->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($attendeeType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($attendeeType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($attendeeType->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Attendees') ?></h4>
        <?php if (!empty($attendeeType->attendees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Middle Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Attendee Type Id') ?></th>
                <th scope="col"><?= __('Attendee Website') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Is Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($attendeeType->attendees as $attendees): ?>
            <tr>
                <td><?= h($attendees->id) ?></td>
                <td><?= h($attendees->first_name) ?></td>
                <td><?= h($attendees->middle_name) ?></td>
                <td><?= h($attendees->last_name) ?></td>
                <td><?= h($attendees->attendee_type_id) ?></td>
                <td><?= h($attendees->attendee_website) ?></td>
                <td><?= h($attendees->company_id) ?></td>
                <td><?= h($attendees->is_active) ?></td>
                <td><?= h($attendees->created) ?></td>
                <td><?= h($attendees->modified) ?></td>
                <td><?= h($attendees->notes) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Attendees', 'action' => 'view', $attendees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Attendees', 'action' => 'edit', $attendees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attendees', 'action' => 'delete', $attendees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
