<div class="lessons view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Lesson'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Lesson'), array('action' => 'edit', $lesson['Lesson']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Lesson'), array('action' => 'delete', $lesson['Lesson']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lesson['Lesson']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Lessons'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Lesson'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Lessons'), array('controller' => 'lessons', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Lesson'), array('controller' => 'lessons', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Categories'), array('controller' => 'categories', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Category'), array('controller' => 'categories', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
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
		<th><?php echo __('Lesson'); ?></th>
		<td>
			<?php echo $this->Html->link($lesson['Lesson'][''], array('controller' => 'lessons', 'action' => 'view', $lesson['Lesson']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Category'); ?></th>
		<td>
			<?php echo $this->Html->link($lesson['Category']['category_id'], array('controller' => 'categories', 'action' => 'view', $lesson['Category']['category_id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created Date'); ?></th>
		<td>
			<?php echo h($lesson['Lesson']['created_date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Updated Date'); ?></th>
		<td>
			<?php echo h($lesson['Lesson']['updated_date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Result'); ?></th>
		<td>
			<?php echo h($lesson['Lesson']['result']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($lesson['User']['user_id'], array('controller' => 'users', 'action' => 'view', $lesson['User']['user_id'])); ?>
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
	<h3><?php echo __('Related Lesson Details'); ?></h3>
	<?php if (!empty($lesson['LessonDetail'])): ?>
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
	<?php foreach ($lesson['LessonDetail'] as $lessonDetail): ?>
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
	<h3><?php echo __('Related Lessons'); ?></h3>
	<?php if (!empty($lesson['Lesson'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Lesson Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Created Date'); ?></th>
		<th><?php echo __('Updated Date'); ?></th>
		<th><?php echo __('Result'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($lesson['Lesson'] as $lesson): ?>
		<tr>
			<td><?php echo $lesson['lesson_id']; ?></td>
			<td><?php echo $lesson['category_id']; ?></td>
			<td><?php echo $lesson['created_date']; ?></td>
			<td><?php echo $lesson['updated_date']; ?></td>
			<td><?php echo $lesson['result']; ?></td>
			<td><?php echo $lesson['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'lessons', 'action' => 'view', $lesson['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'lessons', 'action' => 'edit', $lesson['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'lessons', 'action' => 'delete', $lesson['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lesson['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Lesson'), array('controller' => 'lessons', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
