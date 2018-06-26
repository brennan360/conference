<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendee[]|\Cake\Collection\CollectionInterface $attendees
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
<?php
	if ($permissionLevel <= 10)
	{
?>
        <li><?= $this->Html->link(__('New Attendee'), ['action' => 'add']) ?></li>
        <li><hr></li>
<?php
    }
?>
        <li><?= $this->Html->link(__('List Attendee Types'), ['controller' => 'AttendeeTypes', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="attendees index large-9 medium-8 columns content">
    <h3><?= __('Attendees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= __('Name') ?></th>
<?php
                if ($permissionLevel == 0)
                {
?>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th> 
<?php
                }
?>

                <th scope="col"><?= $this->Paginator->sort('attendee_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attendees as $attendee): ?>
            <tr>
                <td><?= h($attendee->full_name) ?></td>
<?php
                if ($permissionLevel == 0)
                {
?>
                <td><?= h($attendee->has('company') ? $attendee->company->company_name : '') ?></td> 
<?php
                }
?>
                <td><?= h($attendee->has('attendee_type') ? $attendee->attendee_type->description : '') ?></td>
                <td><?= h($attendee->is_active = 1 ? 'yes':'no') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $attendee->id]) ?>
<?php
	if ($permissionLevel <= 10)
	{
?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attendee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attendee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendee->id)]) ?>
 <?php
    }
?>
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
