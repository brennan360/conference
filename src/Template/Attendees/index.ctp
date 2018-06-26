<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendee[]|\Cake\Collection\CollectionInterface $attendees
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Attendee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attendee Types'), ['controller' => 'AttendeeTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attendee Type'), ['controller' => 'AttendeeTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attendees index large-9 medium-8 columns content">
    <h3><?= __('Attendees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('middle_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attendee_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attendee_website') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attendees as $attendee): ?>
            <tr>
                <td><?= $this->Number->format($attendee->id) ?></td>
                <td><?= h($attendee->first_name) ?></td>
                <td><?= h($attendee->middle_name) ?></td>
                <td><?= h($attendee->last_name) ?></td>
                <td><?= $attendee->has('attendee_type') ? $this->Html->link($attendee->attendee_type->id, ['controller' => 'AttendeeTypes', 'action' => 'view', $attendee->attendee_type->id]) : '' ?></td>
                <td><?= h($attendee->attendee_website) ?></td>
                <td><?= $attendee->has('company') ? $this->Html->link($attendee->company->company_name, ['controller' => 'Companies', 'action' => 'view', $attendee->company->id]) : '' ?></td>
                <td><?= h($attendee->is_active) ?></td>
                <td><?= h($attendee->created) ?></td>
                <td><?= h($attendee->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $attendee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attendee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attendee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendee->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
