<h1>Add New Racket</h1>
<?php
echo $this->Form->create('Racket');
echo $this->Form->input('name');
echo $this->Form->input('maker_id', ['options' => $options]);
echo $this->Form->input('price');
echo $this->Form->input('weight');
echo $this->Form->end('Save');
?>