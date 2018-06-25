<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpeakerType[]|\Cake\Collection\CollectionInterface $speakerTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Speaker Type'), ['action' => 'add']) ?></li>
        <li><hr></li>
        <li><?= $this->Html->link(__('List Speakers'), ['controller' => 'Speakers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Speaker'), ['controller' => 'Speakers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="speakerTypes index large-9 medium-8 columns content">
    <h3><?= __('Speaker Types') ?></h3>
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
            <?php foreach ($speakerTypes as $speakerType): ?>
            <tr>
                <td><?= $this->Number->format($speakerType->id) ?></td>
                <td><?= h($speakerType->description) ?></td>
                <td><?= h($speakerType->created) ?></td>
                <td><?= h($speakerType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $speakerType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $speakerType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $speakerType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $speakerType->id)]) ?>
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
