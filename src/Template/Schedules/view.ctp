<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Schedule'), ['action' => 'edit', $schedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Schedule'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Conferences'), ['controller' => 'Conferences', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conference'), ['controller' => 'Conferences', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Location Room Names'), ['controller' => 'LocationRoomNames', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location Room Name'), ['controller' => 'LocationRoomNames', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Speakers'), ['controller' => 'Speakers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Speaker'), ['controller' => 'Speakers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="schedules view large-9 medium-8 columns content">
    <h3><?= h($schedule->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($schedule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $schedule->has('company') ? $this->Html->link($schedule->company->company_name, ['controller' => 'Companies', 'action' => 'view', $schedule->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conference') ?></th>
            <td><?= $schedule->has('conference') ? $this->Html->link($schedule->conference->conference_title, ['controller' => 'Conferences', 'action' => 'view', $schedule->conference->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date Time') ?></th>
            <td><?= h($schedule->start_date_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date Time') ?></th>
            <td><?= h($schedule->end_date_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $schedule->has('location') ? $this->Html->link($schedule->location->location_name, ['controller' => 'Locations', 'action' => 'view', $schedule->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Room Name') ?></th>
            <td><?= $schedule->has('location_room_name') ? $this->Html->link($schedule->location_room_name->room_name, ['controller' => 'LocationRoomNames', 'action' => 'view', $schedule->location_room_name->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Speaker') ?></th>
            <td><?= $schedule->has('speaker') ? $this->Html->link($schedule->speaker->full_name, ['controller' => 'Speakers', 'action' => 'view', $schedule->speaker->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($schedule->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= h($schedule->is_active == 1 ? 'yes':'no') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($schedule->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($schedule->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Genre') ?></h4>
        <?= $this->Text->autoParagraph(h($schedule->genre)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($schedule->description)); ?>
    </div>
</div>
