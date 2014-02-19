

<?php foreach($rackets as $racket): ?>
<table>
    <thead>
        <tr>
            <th>Maker</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $racket['Maker']['name']; ?></td>
            <td><?php echo $this->Html->link($racket['Racket']['name'], ['controller' => 'rackets', 'action' => 'view', $racket['Racket']['id']]) ?></td>
        </tr>
    </tbody>
</table>
<?php endforeach; ?>

