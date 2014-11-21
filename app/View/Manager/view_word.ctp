<div class="words index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Words'); ?></h1>
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
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Word'), array('controller' => 'Manager', 'action' => 'detailWord'), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Categories'), array('controller' => 'Manager', 'action' => 'viewCategory'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Category'), array('controller' => 'Manager', 'action' => 'detailCategory'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Answers'), array('controller' => 'answers', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Answer'), array('controller' => 'answers', 'action' => 'add'), array('escape' => false)); ?> </li>
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
                    <th><?php echo $this->Paginator->sort('word_name'); ?></th>
                    <th><?php echo $this->Paginator->sort('created_date'); ?></th>
                    <th><?php echo $this->Paginator->sort('updated_date'); ?></th>
                    <th><?php echo $this->Paginator->sort('category_id'); ?></th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($words as $word): ?>
                    <tr>
                        <td><?php echo h($word['Word']['id']); ?>&nbsp;</td>
                        <td><?php echo h($word['Word']['word_name']); ?>&nbsp;</td>
                        <td><?php echo h($word['Word']['created_date']); ?>&nbsp;</td>
                        <td><?php echo h($word['Word']['updated_date']); ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link($word['Category']['category_name'], array('controller' => 'Manager', 'action' => 'detailCategory', $word['Category']['id'])); ?>
                        </td>
                        <td class="actions">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller'=>'Manager', 'action' => 'detailWord', $word['Word']['id']), array('escape' => false)); ?>
                            <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller'=>'Manager', 'action' => 'deleteWord', $word['Word']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $word['Word']['id'])); ?>
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