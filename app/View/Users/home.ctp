<?php $this->Html->css('coder_update', array('inline' => false)); ?>
<div class="users index">
    <div class="row">
        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default" align="center">
                    <?php echo $this->Html->image('avatar/' . $user['User']['avatar'], array('class' => 'avatar'));?><br>
                    <?php echo h($user['User']['user_name']);?><br>
                    <?php echo __('Learned '); ?>
                    <?php echo $count; ?>
                    <?php echo __(' words'); ?>
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->
        <div class="col-md-9">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo $this->Html->link(__('Words'), array('controller' => 'words', 'action' => 'list_words'), array('class' => 'btn btn-primary btn-lg btn-block'));?>
                            </div>
                            <div class="col-md-4">
                                <?php echo $this->Html->link(__('Lesson'), array('controller' => 'categories', 'action' => 'list_categories'), array('class' => 'btn btn-primary btn-lg btn-block'));?>
                            </div>
                        </div>
                        <div class="row home activity">
                            <h3><?php echo __('ACTIVITIES'); ?></h3>
                        </div>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                        <?php foreach ($lessons as $lesson): ?>
                            <li><?php echo __('Learned 20 words in Lesson '); ?>
                                <?php echo $lesson['Category']['category_name']; ?>
                                <?php echo __(' - '); ?>
                                <?php echo $lesson['Lesson']['created_date'];?>
                            </li>
                        <?php endforeach;?>
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->
    </div><!-- end row -->
</div><!-- end containing of content -->
