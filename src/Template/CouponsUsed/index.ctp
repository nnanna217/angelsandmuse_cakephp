<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouponsUsed[]|\Cake\Collection\CollectionInterface $couponsUsed
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Coupons Used'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Coupons'), ['controller' => 'Coupons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Coupon'), ['controller' => 'Coupons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="couponsUsed index large-9 medium-8 columns content">
    <h3><?= __('Coupons Used') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coupon_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($couponsUsed as $couponsUsed): ?>
            <tr>
                <td><?= $this->Number->format($couponsUsed->id) ?></td>
                <td><?= $couponsUsed->has('user') ? $this->Html->link($couponsUsed->user->id, ['controller' => 'Users', 'action' => 'view', $couponsUsed->user->id]) : '' ?></td>
                <td><?= $couponsUsed->has('coupon') ? $this->Html->link($couponsUsed->coupon->name, ['controller' => 'Coupons', 'action' => 'view', $couponsUsed->coupon->id]) : '' ?></td>
                <td><?= h($couponsUsed->created) ?></td>
                <td><?= h($couponsUsed->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $couponsUsed->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $couponsUsed->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $couponsUsed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $couponsUsed->id)]) ?>
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
