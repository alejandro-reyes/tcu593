<!-- File: /app/View/Posts/edit.ctp -->

<div class="box box-info">
    
    <div class="box-header with-border">
        <h1 class="box-title">Edit Post</h1>
    </div>
    
    <?php echo $this->Form->create('Post',array('class'=>"form-horizontal")); ?>
    
    <div class="box-body">
        
        <fieldset><?php
        
        echo $this->Form->input('title', array('type' => 'text',
        'before' => '<div class="form-group">',
        'between' => '<div class="col-sm-9">',
        'after' => '</div></div>',
        'label' => array('class' => 'col-sm-1 control-label','text'=>'Title')));
		
        echo $this->Form->input('body', array('type' => 'text',
        'cols' => '100',
        'rows' => '10',
        'before' => '<div class="form-group">',
        'between' => '<div class="col-sm-9">',
        'after' => '</div></div>',
        'label' => array('class' => 'col-sm-1 control-label','text'=>'Body')));
        
        echo $this->Form->input('id', array('type' => 'hidden'));
    
        ?></fieldset>
    </div>
    
    <div class="box-footer text-left">
        <button class="btn btn-info" type="submit">Save post</button>
    </div>

    <?php echo $this->Form->end(); ?>
</div>
