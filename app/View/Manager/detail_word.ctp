<div class="words form">

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
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Words'), array('controller' => 'Manager', 'action' => 'view_word'), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Categories'), array('controller' => 'Manager', 'action' => 'view_category'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Category'), array('controller' => 'Manager', 'action' => 'detail_category'), array('escape' => false)); ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col md 3 -->
        <div class="col-md-9">
            <?php
            echo $this->Form->create('Word', array('url' => array('controller' => 'Manager', $this->request->data('Word.id')))); ?>
            <div class="form-group">
                <?php echo $this->Form->input('word_name', array('class' => 'form-control', 'placeholder' => 'Word Name')); ?>
            </div>
            <div class="form-group">
                <?php
                echo $this->Form->input('category_id', array('options' => $categories, 'class' => 'form-control', 'placeholder' => 'Category Id'));
                ?>
            </div>

            <!--Answer-->

            <div class="title-header-answer"><?php echo __('List Answer'); ?></div>
            <?php for ($i = 0; $i < 4; $i++): ?>
                <?php echo $this->Form->input('Answer.' . $i . '.answer', array('label' => 'Answer ' . ($i + 1), 'class' => 'form-control', 'placeholder' => 'Answer')); ?>

                <?php
                echo $this->Form->hidden('Answer.' . $i . '.id');
                $value = $this->request->data != null ? $this->request->data['Answer'][$i]['is_correct'] : 0;
                $attributes = array('div' => true, 'label' => 'Is answer true', 'type' => 'checkbox', 'options' => array());
                echo $this->Form->input('Answer.' . $i . '.is_correct', $attributes);
                ?>

            <?php endfor; ?>

            <div class="form-group" style="margin-top: 10px">
                <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div>
        <!-- end col md 12 -->
    </div>
    <!-- end row -->
</div>
