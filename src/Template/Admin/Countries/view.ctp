<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country $country
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Country'), ['action' => 'edit', $country->id]) ?> </li>
        <!-- <li><?= $this->Form->postLink(__('Delete Country'), ['action' => 'delete', $country->id], ['confirm' => __('Are you sure you want to delete # {0}?', $country->id)]) ?> </li> -->
        <li><?= $this->Html->link(__('List Countries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="countries view large-9 medium-8 columns content">
    <h3><?= h($country->country_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Country Name') ?></th>
            <td><?= h($country->country_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country Abbr') ?></th>
            <td><?= h($country->country_abbr) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($country->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Companies') ?></h4>
        <?php if (!empty($country->companies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Company Name') ?></th>
                <th scope="col"><?= __('Company Address1') ?></th>
                <th scope="col"><?= __('Company Address2') ?></th>
                <th scope="col"><?= __('Company City') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('Country Id') ?></th>
                <th scope="col"><?= __('Company Zipcode') ?></th>
                <th scope="col"><?= __('Company Email') ?></th>
                <th scope="col"><?= __('Company Phone') ?></th>
                <th scope="col"><?= __('Company Fax') ?></th>
                <th scope="col"><?= __('Company Website') ?></th>
                <th scope="col"><?= __('Is Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($country->companies as $companies): ?>
            <tr>
                <td><?= h($companies->id) ?></td>
                <td><?= h($companies->company_name) ?></td>
                <td><?= h($companies->company_address1) ?></td>
                <td><?= h($companies->company_address2) ?></td>
                <td><?= h($companies->company_city) ?></td>
                <td><?= h($companies->state_id) ?></td>
                <td><?= h($companies->country_id) ?></td>
                <td><?= h($companies->company_zipcode) ?></td>
                <td><?= h($companies->company_email) ?></td>
                <td><?= h($companies->company_phone) ?></td>
                <td><?= h($companies->company_fax) ?></td>
                <td><?= h($companies->company_website) ?></td>
                <td><?= h($companies->is_active) ?></td>
                <td><?= h($companies->created) ?></td>
                <td><?= h($companies->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Companies', 'action' => 'view', $companies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Companies', 'action' => 'edit', $companies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Companies', 'action' => 'delete', $companies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Locations') ?></h4>
        <?php if (!empty($country->locations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Location Name') ?></th>
                <th scope="col"><?= __('Location Address1') ?></th>
                <th scope="col"><?= __('Location Address2') ?></th>
                <th scope="col"><?= __('Location City') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('Country Id') ?></th>
                <th scope="col"><?= __('Location Zipcode') ?></th>
                <th scope="col"><?= __('Location Phone') ?></th>
                <th scope="col"><?= __('Location Fax') ?></th>
                <th scope="col"><?= __('Location Web Address') ?></th>
                <th scope="col"><?= __('Location Description') ?></th>
                <th scope="col"><?= __('Location Image') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($country->locations as $locations): ?>
            <tr>
                <td><?= h($locations->id) ?></td>
                <td><?= h($locations->location_name) ?></td>
                <td><?= h($locations->location_address1) ?></td>
                <td><?= h($locations->location_address2) ?></td>
                <td><?= h($locations->location_city) ?></td>
                <td><?= h($locations->state_id) ?></td>
                <td><?= h($locations->country_id) ?></td>
                <td><?= h($locations->location_zipcode) ?></td>
                <td><?= h($locations->location_phone) ?></td>
                <td><?= h($locations->location_fax) ?></td>
                <td><?= h($locations->location_web_address) ?></td>
                <td><?= h($locations->location_description) ?></td>
                <td><?= h($locations->location_image) ?></td>
                <td><?= h($locations->created) ?></td>
                <td><?= h($locations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Locations', 'action' => 'view', $locations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Locations', 'action' => 'edit', $locations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Locations', 'action' => 'delete', $locations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
