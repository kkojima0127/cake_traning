<h1>Add New Player</h1>
<?php
echo $this->Form->create('Player');
echo $this->Form->input('name');
echo $this->element('profile');
echo $this->Form->end('Save');
?>

