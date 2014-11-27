<div class="users form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo $titlePage; ?></h1>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo __('Actions') ?></div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('action' => 'view_user'), array('escape' => false)); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col md 3 -->
        <div class="col-md-9">
            <?php echo $this->Form->create('User', array('role' => 'form', 'enctype' => 'multipart/form-data')); ?>

            <div class="form-group">
                <?php echo $this->Form->input('user_name', array('class' => 'form-control', 'placeholder' => 'User Name')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password')); ?>
            </div>
            <div class="form-group">

                <?php
                $avatar = ($this->request->data == null) ? '' : $this->request->data['User']['avatar'];
                echo $this->Html->image($this->Common->getImage($avatar), array('alt' => 'No image', 'border' => '0', 'class' => 'img-thumb-100', 'data-src' => 'holder.js/100%x100')); ?>
                <?php echo $this->Form->input('avatar', array('type' => 'hidden')); ?>
                <?php echo $this->Form->file('upload', array('multiple')); ?>
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
