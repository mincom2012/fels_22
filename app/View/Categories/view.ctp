<div class="categories view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Category'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Category'), array('action' => 'edit', $category['Category']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Category'), array('action' => 'delete', $category['Category']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Categories'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Category'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Categories'), array('controller' => 'categories', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Category'), array('controller' => 'categories', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Lesson Details'), array('controller' => 'lesson_details', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Lesson Detail'), array('controller' => 'lesson_details', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Lessons'), array('controller' => 'lessons', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Lesson'), array('controller' => 'lessons', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Words'), array('controller' => 'words', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Word'), array('controller' => 'words', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Category'); ?></th>
		<td>
			<?php echo $this->Html->link($category['Category'][''], array('controller' => 'categories', 'action' => 'view', $category['Category']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Category Name'); ?></th>
		<td>
			<?php echo h($category['Category']['category_name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Description'); ?></th>
		<td>
			<?php echo h($category['Category']['description']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created Date'); ?></th>
		<td>
			<?php echo h($category['Category']['created_date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Updated Date'); ?></th>
		<td>
			<?php echo h($category['Category']['updated_date']); ?>
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
	<h3><?php echo __('Related Categories'); ?></h3>
	<?php if (!empty($category['Category'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Category Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created Date'); ?></th>
		<th><?php echo __('Updated Date'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($category['Category'] as $category): ?>
		<tr>
			<td><?php echo $category['category_id']; ?></td>
			<td><?php echo $category['category_name']; ?></td>
			<td><?php echo $category['description']; ?></td>
			<td><?php echo $category['created_date']; ?></td>
			<td><?php echo $category['updated_date']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'categories', 'action' => 'view', $category['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'categories', 'action' => 'edit', $category['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'categories', 'action' => 'delete', $category['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $category['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Category'), array('controller' => 'categories', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Lesson Details'); ?></h3>
	<?php if (!empty($category['LessonDetail'])): ?>
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
	<?php foreach ($category['LessonDetail'] as $lessonDetail): ?>
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
	<?php if (!empty($category['Lesson'])): ?>
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
	<?php foreach ($category['Lesson'] as $lesson): ?>
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
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Words'); ?></h3>
	<?php if (!empty($category['Word'])): ?>
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
	<?php foreach ($category['Word'] as $word): ?>
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
