<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th> </th>
        <th>Created</th>
    </tr>
    </thead>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array('action' => 'view', $post['Post']['id'])
                );
            ?>
        </td>
        
        <td>
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li>
                    <?php
                        echo $this->Form->postLink(
                        'Delete',
                        array('action' => 'delete', $post['Post']['id']),
                        array('confirm' => 'Are you sure?')
                        );
                    ?>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                    <?php
                        echo $this->Html->link(
                        'Edit', array('action' => 'edit', $post['Post']['id'])
                        );
                    ?>
                </li>
              </ul>
            </div>
        </td>
        
        <td>
            <?php echo $post['Post']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>