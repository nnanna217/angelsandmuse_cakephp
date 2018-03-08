<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouponsUsed $couponsUsed
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Coupons Used'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Coupons'), ['controller' => 'Coupons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Coupon'), ['controller' => 'Coupons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="couponsUsed form large-9 medium-8 columns content">
    <?= $this->Form->create($couponsUsed) ?>
    <fieldset>
        <legend><?= __('Add Coupons Used') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('coupon_id', ['options' => $coupons]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
