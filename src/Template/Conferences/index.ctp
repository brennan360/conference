<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conference[]|\Cake\Collection\CollectionInterface $conferences
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Conference'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="conferences index large-9 medium-8 columns content">
    <h3><?= __('Conferences') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('conference_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('main_page_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('icon_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($conferences as $conference): ?>
            <tr>
                <td><?= $this->Number->format($conference->id) ?></td>
                <td><?= h($conference->conference_title) ?></td>
                <td><?= h($conference->start_date) ?></td>
                <td><?= h($conference->end_date) ?></td>
                <td><?= $conference->has('company') ? $this->Html->link($conference->company->company_name, ['controller' => 'Companies', 'action' => 'view', $conference->company->id]) : '' ?></td>
                <td><?= $conference->has('location') ? $this->Html->link($conference->location->id, ['controller' => 'Locations', 'action' => 'view', $conference->location->id]) : '' ?></td>
                <td><?= h($conference->is_active) ?></td>
                <td><?= h($conference->main_page_image) ?></td>
                <td><?= h($conference->icon_image) ?></td>
                <td><?= h($conference->created) ?></td>
                <td><?= h($conference->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $conference->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $conference->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $conference->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conference->id)]) ?>
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
