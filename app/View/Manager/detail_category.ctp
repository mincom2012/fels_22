<div class="categories form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">

                <h1><?php echo $titlePage ?></h1>

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
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Categories'), array('action' => 'view_category'), array('escape' => false)); ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col md 3 -->
        <div class="col-md-9">
            <?php
            $id = ($this->data == null) ? null : $this->data['Category']['id'];
            echo $this->Form->create('Category', array('url' => array('controller' => 'manager', $id))); ?>

            <div class="form-group">
                <?php echo $this->Form->input('id', array('hidden' => true, 'class' => 'form-control', 'placeholder' => 'Category Id')); ?>
                <?php echo $this->Form->input('category_name', array('class' => 'form-control', 'placeholder' => 'Category Name')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => 'Description', 'type' => 'textarea')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
            </div>

            <?php echo $this->Form->end() ?>

            <?php if ($this->request->data != null): ?>
                <hr>
                <div>
                    <h2><?php echo __('Word related') ?></h2></div>

                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                    <tr>
                        <th><?php echo __('id'); ?></th>
                        <th><?php echo __('word_name'); ?></th>
                        <th><?php echo __('created'); ?></th>
                        <th><?php echo __('modified'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($this->request->data['Word'] as $word): ?>
                        <tr>
                            <td><?php echo h($word['id']); ?>&nbsp;</td>
                            <td><?php echo h($word['word_name']); ?>&nbsp;</td>
                            <td><?php echo h($word['created']); ?>&nbsp;</td>
                            <td><?php echo h($word['modified']); ?>&nbsp;</td>
                            <td class="actions">
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller' => 'Manager', 'action' => 'detail_word', $word['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller' => 'Manager', 'action' => 'delete_word', $word['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $word['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            <?php endif; ?>
        </div>
        <!-- end col md 12 -->

        <div class="col-md-9">

        </div>
    </div>
    <div class="row">


    </div>
    <!-- end row -->
</div>
