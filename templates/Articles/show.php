    <h1>Articles</h1>
    <p><?= $this->Html->link("Add Article", ['action' => 'add']) ?></p>
    <table>
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Body</th>
            <th>Created</th>
            <th>Action</th>
        </tr>

        <!-- Here is where we iterate through our $articles query object, printing out article info -->

        <?php foreach ($art as $article) : ?>
            <tr>
                <td>
                    <?= $this->Html->link(
                        $article->title,
                        ['action' => 'view', $article->slug]
                    ) ?>
                </td>
                <td>
                    <?php
                        echo $article->slug;
                    ?>
                </td>
                <td>
                    <?php
                        echo $article->body;
                    ?>
                </td>
                <td>
                    <?= $article->created->format(DATE_RFC850) ?>
                </td>
                <td>
                    <?= $this->Html->link('Editt', ['action' => 'edit', $article->slug]) ?>
                </td>
                <td>
                    <?= $this->Form->postLink(
                        'Deletee',
                        ['action' => 'delete', $article->slug],
                        ['confirm' => 'Are you sure?'])
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>