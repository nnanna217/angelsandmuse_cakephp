<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coupon $coupon
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Coupon'), ['action' => 'edit', $coupon->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Coupon'), ['action' => 'delete', $coupon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coupon->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Coupons'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coupon'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Coupons Used'), ['controller' => 'CouponsUsed', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coupons Used'), ['controller' => 'CouponsUsed', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="coupons view large-9 medium-8 columns content">
    <h3><?= h($coupon->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($coupon->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($coupon->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($coupon->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount') ?></th>
            <td><?= $this->Number->format($coupon->discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($coupon->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($coupon->updated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $coupon->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Coupons Used') ?></h4>
        <?php if (!empty($coupon->coupons_used)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Coupon Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($coupon->coupons_used as $couponsUsed): ?>
            <tr>
                <td><?= h($couponsUsed->id) ?></td>
                <td><?= h($couponsUsed->user_id) ?></td>
                <td><?= h($couponsUsed->coupon_id) ?></td>
                <td><?= h($couponsUsed->created) ?></td>
                <td><?= h($couponsUsed->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CouponsUsed', 'action' => 'view', $couponsUsed->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CouponsUsed', 'action' => 'edit', $couponsUsed->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CouponsUsed', 'action' => 'delete', $couponsUsed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $couponsUsed->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
