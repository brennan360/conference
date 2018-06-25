<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Speaker $speaker
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Speaker'), ['action' => 'edit', $speaker->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Speaker'), ['action' => 'delete', $speaker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $speaker->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Speakers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Speaker'), ['action' => 'add']) ?> </li>
        <li><hr></li>
        <li><?= $this->Html->link(__('List Speaker Types'), ['controller' => 'SpeakerTypes', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="speakers view large-9 medium-8 columns content">
    <h3><?= h($speaker->full_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($speaker->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($speaker->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author Image') ?></th>
            <td><?= h($speaker->speaker_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Speaker Type') ?></th>
            <td><?= h($speaker->has('speaker_type') ? $speaker->speaker_type->description : '') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Speaker Website') ?></th>
            <td><?= h($speaker->speaker_website) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($speaker->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($speaker->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($speaker->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Private Read And Critique Participant') ?></th>
            <td><?= $speaker->private_read_and_critique_participant ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $speaker->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Bio') ?></h4>
        <?= $this->Text->autoParagraph(h($speaker->bio)); ?>
    </div>
    <div class="row">
        <h4><?= __('Areas Of Expertise') ?></h4>
        <?= $this->Text->autoParagraph(h($speaker->areas_of_expertise)); ?>
    </div>
</div>
