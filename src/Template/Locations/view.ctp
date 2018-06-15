<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Location'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['action' => 'add']) ?> </li>
		<li><hr></li>
        <li><?= $this->Html->link(__('List Conferences'), ['controller' => 'Conferences', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conference'), ['controller' => 'Conferences', 'action' => 'add']) ?> </li>
		<li><hr></li>
        <li><?= $this->Html->link(__('List Location Floorplans'), ['controller' => 'LocationFloorplans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location Floorplan'), ['controller' => 'LocationFloorplans', 'action' => 'add']) ?> </li>
		<li><hr></li>
        <li><?= $this->Html->link(__('List Location Room Names'), ['controller' => 'LocationRoomNames', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location Room Name'), ['controller' => 'LocationRoomNames', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="locations view large-9 medium-8 columns content">
    <h3><?= h($location->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Location Name') ?></th>
            <td><?= h($location->location_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Address1') ?></th>
            <td><?= h($location->location_address1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Address2') ?></th>
            <td><?= h($location->location_address2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location City') ?></th>
            <td><?= h($location->location_city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $location->has('state') ? $this->Html->link($location->state->state_name, ['controller' => 'States', 'action' => 'view', $location->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $location->has('country') ? $this->Html->link($location->country->country_name, ['controller' => 'Countries', 'action' => 'view', $location->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Zipcode') ?></th>
            <td><?= h($location->location_zipcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Phone') ?></th>
            <td><?= h($location->location_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Web Address') ?></th>
            <td><?= h($location->location_web_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Image') ?></th>
            <td><?= h($location->location_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($location->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Fax') ?></th>
            <td><?= $this->Number->format($location->location_fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Id') ?></th>
            <td><?= $this->Number->format($location->company_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($location->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($location->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $location->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Location Description') ?></h4>
        <?= $this->Text->autoParagraph(h($location->location_description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Conferences') ?></h4>
        <?php if (!empty($location->conferences)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Conference Title') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Is Active') ?></th>
                <th scope="col"><?= __('Conference Description') ?></th>
                <th scope="col"><?= __('Main Page Image') ?></th>
                <th scope="col"><?= __('Icon Image') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->conferences as $conferences): ?>
            <tr>
                <td><?= h($conferences->id) ?></td>
                <td><?= h($conferences->conference_title) ?></td>
                <td><?= h($conferences->start_date) ?></td>
                <td><?= h($conferences->end_date) ?></td>
                <td><?= h($conferences->company_id) ?></td>
                <td><?= h($conferences->location_id) ?></td>
                <td><?= h($conferences->is_active) ?></td>
                <td><?= h($conferences->conference_description) ?></td>
                <td><?= h($conferences->main_page_image) ?></td>
                <td><?= h($conferences->icon_image) ?></td>
                <td><?= h($conferences->created) ?></td>
                <td><?= h($conferences->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Conferences', 'action' => 'view', $conferences->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Conferences', 'action' => 'edit', $conferences->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Conferences', 'action' => 'delete', $conferences->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conferences->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Location Floorplans') ?></h4>
        <?php if (!empty($location->location_floorplans)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Floorplan Image') ?></th>
                <th scope="col"><?= __('Floorplan Description') ?></th>
                <th scope="col"><?= __('Is Active') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->location_floorplans as $locationFloorplans): ?>
            <tr>
                <td><?= h($locationFloorplans->id) ?></td>
                <td><?= h($locationFloorplans->floorplan_image) ?></td>
                <td><?= h($locationFloorplans->floorplan_description) ?></td>
                <td><?= h($locationFloorplans->is_active) ?></td>
                <td><?= h($locationFloorplans->location_id) ?></td>
                <td><?= h($locationFloorplans->created) ?></td>
                <td><?= h($locationFloorplans->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'LocationFloorplans', 'action' => 'view', $locationFloorplans->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'LocationFloorplans', 'action' => 'edit', $locationFloorplans->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LocationFloorplans', 'action' => 'delete', $locationFloorplans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationFloorplans->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Location Room Names') ?></h4>
        <?php if (!empty($location->location_room_names)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Room Name') ?></th>
                <th scope="col"><?= __('Nickname') ?></th>
                <th scope="col"><?= __('Is Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->location_room_names as $locationRoomNames): ?>
            <tr>
                <td><?= h($locationRoomNames->id) ?></td>
                <td><?= h($locationRoomNames->location_id) ?></td>
                <td><?= h($locationRoomNames->room_name) ?></td>
                <td><?= h($locationRoomNames->nickname) ?></td>
                <td><?= h($locationRoomNames->is_active) ?></td>
                <td><?= h($locationRoomNames->created) ?></td>
                <td><?= h($locationRoomNames->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'LocationRoomNames', 'action' => 'view', $locationRoomNames->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'LocationRoomNames', 'action' => 'edit', $locationRoomNames->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LocationRoomNames', 'action' => 'delete', $locationRoomNames->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationRoomNames->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
