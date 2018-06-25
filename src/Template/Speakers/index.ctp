<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Speaker[]|\Cake\Collection\CollectionInterface $speakers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
<?php
	if ($permissionLevel <= 10)
	{
?>
        <li><?= $this->Html->link(__('New Speaker'), ['action' => 'add']) ?></li>
        <li><hr></li>
<?php
	}
?>
        <li><?= $this->Html->link(__('List Speaker Types'), ['controller' => 'SpeakerTypes', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="speakers index large-9 medium-8 columns content">
    <h3><?= __('Speakers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('speaker_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('speaker_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('private_read_and_critique_participant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($speakers as $speaker): ?>
            <tr>
                <td><?= h($speaker->first_name) ?></td>
                <td><?= h($speaker->last_name) ?></td>
                <td><?php echo $this->Html->image($speaker->speaker_image, array('style' => 'max-height:50px;','alt'=>$speaker->first_name . ' ' . $speaker->last_name)); ?></td>
                <td><?= h($speaker->has('speaker_type') ? $speaker->speaker_type->description : '') ?></td>
                <td><?= h($speaker->private_read_and_critique_participant == 1 ? 'yes':'no') ?></td>
                <td><?= h($speaker->is_active == 1 ? 'yes':'no') ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $speaker->id]) ?>
<?php
	if ($permissionLevel <= 10)
	{
?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $speaker->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $speaker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $speaker->id)]) ?>
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
