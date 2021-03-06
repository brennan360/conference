<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpeakerType $speakerType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Speaker Type'), ['action' => 'edit', $speakerType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Speaker Type'), ['action' => 'delete', $speakerType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $speakerType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Speaker Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Speaker Type'), ['action' => 'add']) ?> </li>
        <li><hr></li>
        <li><?= $this->Html->link(__('List Speakers'), '/speakers/index') ?> </li>
        <li><?= $this->Html->link(__('New Speaker'), '/speakers/add') ?> </li>
    </ul>
</nav>
<div class="speakerTypes view large-9 medium-8 columns content">
    <h3><?= h($speakerType->description) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($speakerType->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($speakerType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($speakerType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($speakerType->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Speakers') ?></h4>
        <?php if (!empty($speakerType->speakers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Author Image') ?></th>
                <th scope="col"><?= __('Is Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($speakerType->speakers as $speakers): ?>
            <tr>
                <td><?= h($speakers->first_name) ?></td>
                <td><?= h($speakers->last_name) ?></td>
                <td><?= h($speakers->speaker_image) ?></td>
                <td><?= h($speakers->is_active == 1 ? 'yes':'no') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Speakers', 'action' => 'view', $speakers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Speakers', 'action' => 'edit', $speakers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Speakers', 'action' => 'delete', $speakers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $speakers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
