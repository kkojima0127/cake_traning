<h1>Players</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
<?php echo $this->Html->link('Add', ['action' => 'add'], ['class' => 'pretty mediun primary btn']) ?>
<?php foreach($players as $player): ?>
        <tr>
            <td><?php echo $this->Html->link($player['Player']['name'], ['action' => 'view', $player['Player']['id']]) ?></td>
            <td>
            <?php echo $this->Html->link('Edit', ['controller' => 'players', 'action' => 'edit', $player['Player']['id']]) ?>
            <?php echo $this->Form->postlink('Delete', ['action' => 'delete', $player['Player']['id']], ['confirm' => 'Are you sure?']) ?>
            </td>
        </tr>
    </tbody>
<?php endforeach; ?>
</table>