<div class="categories index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Categories'); ?></h1>
            </div>
        </div>
        <!-- end col md 12 -->
    </div>
    <!-- end row -->


    <div class="row">

        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Category'), array('action' => 'detailCategory'), array('escape' => false)); ?></li>

                        </ul>
                    </div>
                    <!-- end body -->
                </div>
                <!-- end panel -->
            </div>
            <!-- end actions -->
        </div>
        <!-- end col md 3 -->

        <div class="col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('category_name'); ?></th>
                    <th><?php echo $this->Paginator->sort('description'); ?></th>
                    <th><?php echo $this->Paginator->sort('created_date'); ?></th>
                    <th><?php echo $this->Paginator->sort('updated_date'); ?></th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
                        <td><?php echo h($category['Category']['category_name']); ?>&nbsp;</td>
                        <td><?php echo h($category['Category']['description']); ?>&nbsp;</td>
                        <td><?php echo h($category['Category']['created_date']); ?>&nbsp;</td>
                        <td><?php echo h($category['Category']['updated_date']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'detailCategory', $category['Category']['id']), array('escape' => false)); ?>
                            <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'deleteCategory', $category['Category']['id']), array('escape' => false), __('Are you sure you want to delete category # %s?', $category['Category']['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div style="float: right;    font-weight: bold;">
                <small><?php echo $this->Paginator->counter(array('format' => __('Total {:count} records - Page {:page}/{:pages}'))); ?></small>
            </div>

            <?php
            $params = $this->Paginator->params();
            if ($params['pageCount'] > 1) {
                ?>
                <ul class="pagination pagination-sm">
                    <?php
                    echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                    echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
                    echo $this->Paginator->next('Next &rarr;', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
                    ?>
                </ul>
            <?php } ?>

        </div>
        <!-- end col md 9 -->
    </div>
    <!-- end row -->


</div><!-- end containing of content -->