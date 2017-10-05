<?php
use yii\helpers\Html;
$this->title='Расписание';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if(!empty($schedule)): ?>
	<table class="table">
		<tr>
			<th>День недели</th>
			<th>Факультет</th>
			<th>Препод</th>
		</tr>
		<?php foreach ($schedule as $item): ?>
			<tr>
				<td><?= $item->day ?></td>
				<td><?= $item->faculty->name ?></td>
				<td><?= $item->lecturer->name ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php endif; ?>
