<?php echo $this->Html->script('new_lesson', array('inline' => false)); ?>
<div class="lessons view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo $categoryName; ?></h1>
                <div id='categoryId' class="hidden"><?php echo $categoryId; ?></div>
                <span>1<span>/20
            </div>
        </div>
    </div>

    <?php foreach ($words as $count => $word): ?>
    <div class="row <?php if ($count != 1) echo 'hidden'; ?>" id="show_<?php echo $count;?>">
        <div class="col-md-5" align="center" >
            <h4><?php echo $word['Word']['word_source']?></h4>
            <button  type="button" class="btn btn-default btn-lag">Speak</button>
        </div>
        <div class="col-md-4">
            <div class="row">
                <button type="button" id="answer_<?php echo $word['Word']['word_id'];?>_<?php echo $word['Answer']['0']['id'] ?>" class="btn btn-default btn-lag" style="width:150px"><?php echo $word['Answer']['0']['answer'] ?></button>
            </div>
            <div class="row">
                <button type="button" id="answer_<?php echo $word['Word']['word_id'];?>_<?php echo $word['Answer']['1']['id'] ?>" class="btn btn-default btn-lag" style="width:150px"><?php echo $word['Answer']['1']['answer'] ?></button>
            </div>
            <div class="row">
                <button type="button" id="answer_<?php echo $word['Word']['word_id'];?>_<?php echo $word['Answer']['2']['id'] ?>" class="btn btn-default btn-lag" style="width:150px"><?php echo $word['Answer']['2']['answer'] ?></button>
            </div>
            <div class="row">
                <button type="button" id="answer_<?php echo $word['Word']['word_id'];?>_<?php echo $word['Answer']['3']['id'] ?>" class="btn btn-default btn-lag" style="width:150px"><?php echo $word['Answer']['3']['answer'] ?></button>
            </div>
        </div>
    </div>
    <?php endforeach;?>     
    </div>
    <div class="row" align="right" id="btn-function">
        <button class="btn btn-default btn-lg" type="button" id="back"><?php echo __('Back'); ?></button>
        <button class="btn btn-default btn-lg" type="button" id="next"><?php echo __('Next'); ?></button>
        <button class="btn btn-default btn-lg hidden" type="button" id="send"><?php echo __('Send'); ?></button>
        <a class="btn btn-success btn-lg hidden" href="#" id="view-result"><?php echo __('View Result'); ?></a>
    </div>
</div>
