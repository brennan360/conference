<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LocationRoomName[]|\Cake\Collection\CollectionInterface $locationRoomNames
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Location Room Name'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="locationRoomNames index large-9 medium-8 columns content">
    <h3><?= __('Location Room Names') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('room_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nickname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locationRoomNames as $locationRoomName): ?>
            <tr>
                <td><?= $this->Number->format($locationRoomName->id) ?></td>
                <td><?= $locationRoomName->has('location') ? $this->Html->link($locationRoomName->location->id, ['controller' => 'Locations', 'action' => 'view', $locationRoomName->location->id]) : '' ?></td>
                <td><?= h($locationRoomName->room_name) ?></td>
                <td><?= h($locationRoomName->nickname) ?></td>
                <td><?= h($locationRoomName->is_active) ?></td>
                <td><?= h($locationRoomName->created) ?></td>
                <td><?= h($locationRoomName->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $locationRoomName->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $locationRoomName->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $locationRoomName->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationRoomName->id)]) ?>
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
