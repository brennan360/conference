<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpeakerType $speakerType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $speakerType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $speakerType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Speaker Types'), ['action' => 'index']) ?></li>
        <li><hr></li>
        <li><?= $this->Html->link(__('List Speakers'), '/speakers/index') ?></li>
        <li><?= $this->Html->link(__('New Speaker'), '/speakers/add') ?></li>
    </ul>
</nav>
<div class="speakerTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($speakerType) ?>
    <fieldset>
        <legend><?= __('Edit Speaker Type') ?></legend>
        <?php
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
