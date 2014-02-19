<?php 
echo $this->Html->script([
    'libs/modernizr-2.6.2.min.js',
    'libs/gumby.min.js',
]);
?>

<section class="tabs">
    <ul class="tab-nav">
        <li class="active">
            <a href="#">Maker List</a>
        </li>
        <li class="">
            <a href="#">Add</a>
        </li>
    </ul>

    <div class="tab-content active">
        <table>
            <thead>
                <th>Maker</th>
                <th>Link</th>
                <th>Action</th>
            </thead>
            <tbody>
<?php foreach($makers as $maker): ?>
                <tr>
                    <td><?= $maker['Maker']['name']; ?></td>
                    <td>
                        <?php if ($maker['Maker']['official_site']): ?>
                        <?php     echo $this->Html->link("{$maker['Maker']['name']}のオフィシャルサイト", $maker['Maker']['official_site']); ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?= $this->Html->link('Edit', ['action' => 'edit', $maker['Maker']['id']]) ?>
                        <?= $this->Form->postlink('Delete', ['action' => 'delete', $maker['Maker']['id']], ['confirm' => 'Are you sure?']) ?>
                    </td>
                </tr>
<?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="tab-content">
        <h1>Add Maker</h1>
        <?php echo $this->Form->create('Maker', ['action' => 'add']) ?>
        <?php echo $this->Form->input('name') ?>
        <?php echo $this->Form->input('official_site') ?>
        <?php echo $this->Form->end('Save') ?>
    </div>
</section>

