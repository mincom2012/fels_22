<div class="lessonDetails view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Lesson Detail'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Lesson Detail'), array('action' => 'edit', $lessonDetail['LessonDetail']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Lesson Detail'), array('action' => 'delete', $lessonDetail['LessonDetail']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lessonDetail['LessonDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Lesson Details'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Lesson Detail'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Lesson Details'), array('controller' => 'lesson_details', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Lesson Detail'), array('controller' => 'lesson_details', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Categories'), array('controller' => 'categories', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Category'), array('controller' => 'categories', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Words'), array('controller' => 'words', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Word'), array('controller' => 'words', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Lessons'), array('controller' => 'lessons', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Lesson'), array('controller' => 'lessons', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Lesson Detail'); ?></th>
		<td>
			<?php echo $this->Html->link($lessonDetail['LessonDetail'][''], array('controller' => 'lesson_details', 'action' => 'view', $lessonDetail['LessonDetail']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Category'); ?></th>
		<td>
			<?php echo $this->Html->link($lessonDetail['Category']['category_id'], array('controller' => 'categories', 'action' => 'view', $lessonDetail['Category']['category_id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created Date'); ?></th>
		<td>
			<?php echo h($lessonDetail['LessonDetail']['created_date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Updated Date'); ?></th>
		<td>
			<?php echo h($lessonDetail['LessonDetail']['updated_date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Word'); ?></th>
		<td>
			<?php echo $this->Html->link($lessonDetail['Word']['word_id'], array('controller' => 'words', 'action' => 'view', $lessonDetail['Word']['word_id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Lesson'); ?></th>
		<td>
			<?php echo $this->Html->link($lessonDetail['Lesson']['lesson_id'], array('controller' => 'lessons', 'action' => 'view', $lessonDetail['Lesson']['lesson_id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($lessonDetail['User']['user_id'], array('controller' => 'users', 'action' => 'view', $lessonDetail['User']['user_id'])); ?>
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
	<?php if (!empty($lessonDetail['LessonDetail'])): ?>
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
	<?php foreach ($lessonDetail['LessonDetail'] as $lessonDetail): ?>
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
