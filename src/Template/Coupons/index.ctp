<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coupon[]|\Cake\Collection\CollectionInterface $coupons
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Add a New Coupon'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Coupons'), ['action' => 'index']) ?></li>

    </ul>
</nav>
<div class="coupons index large-9 medium-8 columns content">
    <h3><?= __('Coupons') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($coupons as $coupon): ?>
            <tr>
                <td><?= $this->Number->format($coupon->id) ?></td>
                <td><?= h($coupon->name) ?></td>
                <td><?= $this->Number->format($coupon->discount) ?></td>
                <td><?= h($coupon->slug) ?></td>
                <td><?= h($coupon->start) ?></td>
                <td><?= h($coupon->end) ?></td>
                <td><?= h($coupon->created) ?></td>
                <td><?= h($coupon->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $coupon->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coupon->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $coupon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coupon->id)]) ?>
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
