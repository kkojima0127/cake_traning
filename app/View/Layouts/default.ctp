<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
	echo $this->Html->meta('icon');
        echo $this->Html->css(['gumby', 'style']);
        echo $this->Html->script(['libs/jquery-2.0.2.min.js']);

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
</head>
<body>
    <div id="container">
        <div id="header">
            <div id="nav7" class="margin_top pretty navbar row">
                <div class="row">
                    <h3 class="white four columns">Tennis Yard</h3>
                    <ul class="eight columns">
                        <?php if (LOGIN): ?>
                        <li><?= $this->Html->link('Home', ['controller' => 'posts', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Player', ['controller' => 'players', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Racket', ['controller' => 'rackets', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Maker', ['controller' => 'makers', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout']) ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Session->flash('auth'); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <div id="footer">
        </div>
    </div>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
