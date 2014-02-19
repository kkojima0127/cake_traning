<h1>Edit New Player</h1>
<?php
echo $this->Form->create('Player');
echo $this->Form->hidden('id');
echo $this->Form->input('name');
echo $this->element('profile');
echo $this->Form->end('Save');
?>

