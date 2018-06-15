<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conference $conference
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Conference'), ['action' => 'edit', $conference->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Conference'), ['action' => 'delete', $conference->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conference->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Conferences'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conference'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="conferences view large-9 medium-8 columns content">
    <h3><?= h($conference->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Conference Title') ?></th>
            <td><?= h($conference->conference_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $conference->has('company') ? $this->Html->link($conference->company->company_name, ['controller' => 'Companies', 'action' => 'view', $conference->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $conference->has('location') ? $this->Html->link($conference->location->id, ['controller' => 'Locations', 'action' => 'view', $conference->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Main Page Image') ?></th>
            <td><?= h($conference->main_page_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Icon Image') ?></th>
            <td><?= h($conference->icon_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($conference->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($conference->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($conference->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($conference->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($conference->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $conference->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Conference Description') ?></h4>
        <?= $this->Text->autoParagraph(h($conference->conference_description)); ?>
    </div>
</div>
