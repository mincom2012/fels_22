<?php echo $this->Html->css('coder_update'); ?>
<div class="lessons view">
    <div class="row">
        <div class="col-md-3">
            <h1><?php echo $categoryName;?></h1>
        </div>
        <div class="col-md-3 result-header">
            <div class="result-contain">
                <?php echo $result.'/'.count($answers);?>
            </div>
        </div>
    </div>
    <?php //debug($lessons); die; ?>
    <?php foreach ($lessons as $lesson): ?>
        <?php $id = $lesson['LessonDetail']['answer_id']; ?>
    <div class="row">
        <div class="col-md-2" align="center">
            <span class="<?php if($answers[$id][0] === true) echo 'glyphicon glyphicon-ok green'; else echo 'glyphicon glyphicon-remove red'; ?> result-icon"></span>
        </div>
        <div class="col-md-2"><?php echo $lesson['Word']['word_source']; ?></div>
        <div class="col-md-2"><?php echo $answers[$id][1]; ?></div>
        <div class="col-md-2"><button class="btn btn-default btn-small" type="button" id="Speak">Speak</button></div>
    </div>
    <?php endforeach; ?>
</div>
