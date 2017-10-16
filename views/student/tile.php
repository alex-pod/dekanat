<?php
use yii\helpers\Html;
$this->title='Зачисленные студенты плиткой';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if(!empty($students)): ?>
	<div class="row">
		<?php foreach ($students as $student): ?>
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 student">
				<div class="thumbnail">
					<span>Имя: <?= Html::encode($student->firstname) ?></span><br>
					<span>Фамилия: <?= Html::encode($student->lastname) ?></span><br>
					<span>Email: <?= Html::encode($student->email) ?></span><br>
					<span>Факультет: <?= $student->faculty->name ?></span>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<?= \yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>
<?php endif; ?>