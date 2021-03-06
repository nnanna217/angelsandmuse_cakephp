<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $event->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($event,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Edit Event') ?></legend>
        <?php
            echo $this->Form->control('event',array('label'=>'Name of Event'));
            echo $this->Form->control('event_date');
            echo $this->Froala->editor('textarea', array('minHeight' => '200px', 'maxHeight' => '400px'));
            echo $this->Form->control('event_desc');
            echo $this->Form->control('featured_img',['type'=>'file']);
            echo $this->Form->control('registration_label');
            echo $this->Form->control('registration_link');
            echo $this->Form->control('gallery_label');
            echo $this->Form->control('gallery_link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
