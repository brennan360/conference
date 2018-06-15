<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Company'), ['action' => 'edit', $company->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Company'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="companies view large-9 medium-8 columns content">
    <h3><?= h($company->company_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Company Name') ?></th>
            <td><?= h($company->company_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Address1') ?></th>
            <td><?= h($company->company_address1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Address2') ?></th>
            <td><?= h($company->company_address2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company City') ?></th>
            <td><?= h($company->company_city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $company->has('state') ? $this->Html->link($company->state->state_name, ['controller' => 'States', 'action' => 'view', $company->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $company->has('country') ? $this->Html->link($company->country->country_name, ['controller' => 'Countries', 'action' => 'view', $company->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Zipcode') ?></th>
            <td><?= h($company->company_zipcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Email') ?></th>
            <td><?= h($company->company_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Phone') ?></th>
            <td><?= h($company->company_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Fax') ?></th>
            <td><?= h($company->company_fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Website') ?></th>
            <td><?= h($company->company_website) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($company->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($company->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($company->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $company->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Conferences') ?></h4>
        <?php if (!empty($company->conferences)): ?>
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
            <?php foreach ($company->conferences as $conferences): ?>
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
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($company->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Is Active') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Permission Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($company->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->is_active) ?></td>
                <td><?= h($users->company_id) ?></td>
                <td><?= h($users->permission_id) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
