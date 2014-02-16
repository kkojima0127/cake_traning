<h1>Blog posts</h1>
<p>こんにちは、<?= USER_NAME ?>さん</p>
<div class="pretty medium primary btn" >
<?php echo $this->Html->link('新規投稿', ['controller' => 'posts', 'action' => 'add']); ?>
</div>
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

