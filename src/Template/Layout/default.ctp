<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
    <head>
    <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
        </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css') ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_editor.pkgd.min.css') ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_style.min.css') ?>
        
    <?=$this->Html->script(array('http://code.jquery.com/jquery-1.11.0.min.js','https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/js/froala_editor.pkgd.min.js'));?>        

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    </head>
    <body>
        <nav class="top-bar expanded" data-topbar role="navigation">
            <ul class="title-area large-3 medium-4 columns">
                <li class="name">
                    <h1><a href=""><?= $this->fetch('title') ?></a></h1>
                </li>
            </ul>
            <div class="top-bar-section">
                <ul class="right">
                    <li><?= $this->Html->link(__('Home'), ['controller' => 'Homes','action' => 'index']) ?></li>

                    <?php if($this->request->session()->read('Auth.User.id')):?>
                    <li><?= $this->Html->link(__('Log Out'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    <?= $this->Flash->render() ?>
        <div class="container clearfix">
        <?= $this->fetch('content') ?>
        </div>
        <footer>
        </footer>
    </body>
</html>
