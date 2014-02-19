<?php echo $this->Form->create() ?>
<?php echo $this->Form->input('title') ?>
<?php echo $this->Form->end('検索') ?>

<table>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td><?php echo $post['User']['username'] ?></td>
        <td><?php echo $this->Html->link($post['Post']['title'], ['controller' => 'posts', 'action' => 'view', $post['Post']['id']]); ?></td>
        <td>
            <?php echo $this->Html->link('Edit', ['controller' => 'posts', 'action' => 'edit', $post['Post']['id']]); ?>
            <?php echo $this->Form->postLink('Delete', ['action' => 'delete', $post['Post']['id']], ['confirm' => 'Are you sure?']); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>