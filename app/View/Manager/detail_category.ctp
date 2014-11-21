<div class="categories form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Add Category'); ?></h1>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Categories'), array('action' => 'viewCategory'), array('escape' => false)); ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col md 3 -->
        <div class="col-md-9">
            <?php
            $id = $this->data == null ? null : $this->data['Category']['id'];
            echo $this->Form->create('Category', array('url' => array('controller' => 'manager', $id))); ?>

            <div class="form-group">
                <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Category Id')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('category_name', array('class' => 'form-control', 'placeholder' => 'Category Name')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => 'Description', 'type' => 'textarea')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div>
        <!-- end col md 12 -->
    </div>
    <!-- end row -->
</div>
