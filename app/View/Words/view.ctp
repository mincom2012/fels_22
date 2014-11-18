<div class="words view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Word'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Word'), array('action' => 'edit', $word['Word']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Word'), array('action' => 'delete', $word['Word']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $word['Word']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Words'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Word'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Words'), array('controller' => 'words', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Word'), array('controller' => 'words', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Categories'), array('controller' => 'categories', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Category'), array('controller' => 'categories', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Answers'), array('controller' => 'answers', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Answer'), array('controller' => 'answers', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Lesson Details'), array('controller' => 'lesson_details', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Lesson Detail'), array('controller' => 'lesson_details', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Word'); ?></th>
		<td>
			<?php echo $this->Html->link($word['Word'][''], array('controller' => 'words', 'action' => 'view', $word['Word']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Word Source'); ?></th>
		<td>
			<?php echo h($word['Word']['word_source']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Word Target'); ?></th>
		<td>
			<?php echo h($word['Word']['word_target']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created Date'); ?></th>
		<td>
			<?php echo h($word['Word']['created_date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Updated Date'); ?></th>
		<td>
			<?php echo h($word['Word']['updated_date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Category'); ?></th>
		<td>
			<?php echo $this->Html->link($word['Category']['category_id'], array('controller' => 'categories', 'action' => 'view', $word['Category']['category_id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Answers'); ?></h3>
	<?php if (!empty($word['Answer'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Word Id'); ?></th>
		<th><?php echo __('Answer'); ?></th>
		<th><?php echo __('Is Correct'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($word['Answer'] as $answer): ?>
		<tr>
			<td><?php echo $answer['word_id']; ?></td>
			<td><?php echo $answer['answer']; ?></td>
			<td><?php echo $answer['is_correct']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'answers', 'action' => 'view', $answer['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'answers', 'action' => 'edit', $answer['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'answers', 'action' => 'delete', $answer['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $answer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Answer'), array('controller' => 'answers', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Lesson Details'); ?></h3>
	<?php if (!empty($word['LessonDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Lesson Detail Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Created Date'); ?></th>
		<th><?php echo __('Updated Date'); ?></th>
		<th><?php echo __('Word Id'); ?></th>
		<th><?php echo __('Lesson Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($word['LessonDetail'] as $lessonDetail): ?>
		<tr>
			<td><?php echo $lessonDetail['lesson_detail_id']; ?></td>
			<td><?php echo $lessonDetail['category_id']; ?></td>
			<td><?php echo $lessonDetail['created_date']; ?></td>
			<td><?php echo $lessonDetail['updated_date']; ?></td>
			<td><?php echo $lessonDetail['word_id']; ?></td>
			<td><?php echo $lessonDetail['lesson_id']; ?></td>
			<td><?php echo $lessonDetail['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'lesson_details', 'action' => 'view', $lessonDetail['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'lesson_details', 'action' => 'edit', $lessonDetail['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'lesson_details', 'action' => 'delete', $lessonDetail['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lessonDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Lesson Detail'), array('controller' => 'lesson_details', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Words'); ?></h3>
	<?php if (!empty($word['Word'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Word Id'); ?></th>
		<th><?php echo __('Word Source'); ?></th>
		<th><?php echo __('Word Target'); ?></th>
		<th><?php echo __('Created Date'); ?></th>
		<th><?php echo __('Updated Date'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($word['Word'] as $word): ?>
		<tr>
			<td><?php echo $word['word_id']; ?></td>
			<td><?php echo $word['word_source']; ?></td>
			<td><?php echo $word['word_target']; ?></td>
			<td><?php echo $word['created_date']; ?></td>
			<td><?php echo $word['updated_date']; ?></td>
			<td><?php echo $word['category_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'words', 'action' => 'view', $word['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'words', 'action' => 'edit', $word['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'words', 'action' => 'delete', $word['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $word['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Word'), array('controller' => 'words', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
