<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouponsUsed $couponsUsed
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Coupons Used'), ['action' => 'edit', $couponsUsed->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Coupons Used'), ['action' => 'delete', $couponsUsed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $couponsUsed->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Coupons Used'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coupons Used'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Coupons'), ['controller' => 'Coupons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coupon'), ['controller' => 'Coupons', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="couponsUsed view large-9 medium-8 columns content">
    <h3><?= h($couponsUsed->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $couponsUsed->has('user') ? $this->Html->link($couponsUsed->user->id, ['controller' => 'Users', 'action' => 'view', $couponsUsed->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coupon') ?></th>
            <td><?= $couponsUsed->has('coupon') ? $this->Html->link($couponsUsed->coupon->name, ['controller' => 'Coupons', 'action' => 'view', $couponsUsed->coupon->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($couponsUsed->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($couponsUsed->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($couponsUsed->updated) ?></td>
        </tr>
    </table>
</div>
