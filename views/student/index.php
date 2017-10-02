<?php
use yii\helpers\Html;
$this->title='Зачисленные студенты';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if(!empty($students)): ?>
	<table class="table">
		<tr>
			<th>Имя</th>
			<th>Фамилия</th>
			<th>Email</th>
			<th>Факультет</th>
		</tr>
	<?php foreach ($students as $student): ?>
		<tr>
			<td><?= Html::encode($student->firstname) ?></td>
			<td><?= Html::encode($student->lastname) ?></td>
			<td><?= Html::encode($student->email) ?></td>
			<td><?= $student->faculty->name ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?= \yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>
<?php endif; ?>