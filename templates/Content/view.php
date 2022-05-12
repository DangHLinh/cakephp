<?php foreach ($groups_now as $gr) : ?>
    <button type="button" class="btn btn-outline-success">
        <?= $gr->group_name ?>
    </button>

    <form method="post" action="/groups/delete">
        <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
        <input type="hidden" name="group_id" value="<?= $gr->group_id ?>">
        <button type="submit" class="btn btn-primary">Delete</button>
    </form>

    <form method="post" action="/groups/edit">
        <input type="text" name="group_name" value="<?= $gr->group_name ?>">
        <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
        <input type="hidden" name="group_id" value="<?= $gr->group_id ?>">
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

<?php endforeach; ?>

<?php foreach ($contents as $ct) : ?>
    <button type="button" class="btn btn-outline-success"><?= $ct->content_body ?></button>
    <form method="post" action="/contents/delete">
        <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
        <input type="hidden" name="content_id" value="<?= $ct->content_id ?>">
        <input type="hidden" name="group_id" value="<?= $gr->group_id ?>">
        <button type="submit" class="btn btn-primary">Delete</button>
        
    </form>
    <br>
<?php endforeach; ?>

<form method="post" action="/contents/add">
    <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
    <input type="text" name="content_body">
    <input type="hidden" name="group_id" value="<?= $gr->group_id ?>">
    <button type="submit" class="btn btn-primary">Send</button>
</form>