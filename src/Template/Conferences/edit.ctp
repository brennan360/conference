<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conference $conference
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $conference->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $conference->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Conferences'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="conferences form large-9 medium-8 columns content">
    <?= $this->Form->create($conference) ?>
    <fieldset>
        <legend><?= __('Edit Conference') ?></legend>
        <?php
            echo $this->Form->control('conference_title');
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('company_id', ['options' => $companies, 'empty' => true]);
            echo $this->Form->control('location_id', ['options' => $locations]);
            echo $this->Form->control('is_active');
            echo $this->Form->control('conference_description');
            echo $this->Form->control('main_page_image');
            echo $this->Form->control('icon_image');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
