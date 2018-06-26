<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttendeeType[]|\Cake\Collection\CollectionInterface $attendeeTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Attendee Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attendees'), ['controller' => 'Attendees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attendee'), ['controller' => 'Attendees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attendeeTypes index large-9 medium-8 columns content">
    <h3><?= __('Attendee Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attendeeTypes as $attendeeType): ?>
            <tr>
                <td><?= $this->Number->format($attendeeType->id) ?></td>
                <td><?= h($attendeeType->description) ?></td>
                <td><?= h($attendeeType->created) ?></td>
                <td><?= h($attendeeType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $attendeeType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attendeeType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attendeeType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendeeType->id)]) ?>
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
