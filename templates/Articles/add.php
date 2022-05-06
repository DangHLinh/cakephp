<h1>Add Article</h1>
<?php
    echo $this->Form->create($article);
    // Hard code the user for now.
    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->radio('rooms', ['0' => 'Nam', '1' => 'Nu']);

    echo $this->Form->control('body');
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();

    echo $this->Form->create();
?>