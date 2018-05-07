<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Add a New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?></li>    </ul>
</nav>
<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($event) ?>
    <fieldset>
        <legend><?= __('Add Event') ?></legend>
        <?php
            echo $this->Form->control('event', array('label'=>'Event Name'));
            echo $this->Form->control('event_date');
//            echo $this->Froala->plugin(); 
            echo $this->Froala->editor('textarea', array('minHeight' => '200px', 'maxHeight' => '400px'));
            echo $this->Form->control('event_desc'));
            echo $this->Form->control('featured_img');
            echo $this->Form->control('registration_label');
            echo $this->Form->control('registration_link');
            echo $this->Form->control('gallery_label');
            echo $this->Form->control('gallery_link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
