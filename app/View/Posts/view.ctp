<!-- File: /app/View/Posts/view.ctp -->

<div class="box box-info">
    
    <div class="box-header with-border">
        <h3 class="box-title"><b><?php echo h($post['Post']['title']); ?></b></h3>
        <p><small>Created: <?php echo $post['Post']['created']; ?></small></p>
    </div>
    
    <blockquote><p><?php echo h($post['Post']['body']); ?></p></blockquote>

</div>
