<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Деканат';
?>
<div class="site-index">

    <div class="jumbotron">
        <h3>Регистрация для зачисления:</h3>

        <div class="body-content">

		    <?php $form = ActiveForm::begin(
			    [
				    'action' => 'index.php?r=site/register',
				    'options' => [
					    'class' => 'signup-form'
				    ]
			    ]
		    ); ?>
		    <?= $form->field($model, 'firstname')->textInput(['placeholder' => 'Имя']) ?>
		    <?= $form->field($model, 'lastname')->textInput(['placeholder' => 'Фамилия']) ?>
		    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Еmail']) ?>
		    <?php $items = [
                    '1' => 'Робототехника',
                    '2' => 'Нано-хирургия',
                    '3' => 'Инженерия'
                ];
                $params = [
                    'prompt' => 'Выберите факультет'
                ];
                echo $form->field($model, 'faculty_id')->dropDownList($items,$params); ?>
		    <?= $form->field($model, 'sex')->dropDownList([
			    'male' => 'Мужской',
			    'female' => 'Женский'
		    ]) ?>

            <div class="form-group">
			    <?= Html::submitButton('Регистрация', ['class' => '']) ?>
            </div>
            </form>
		    <?php ActiveForm::end(); ?>

            <?php if (Yii::$app->session->hasFlash('success') || Yii::$app->session->hasFlash('danger')): ?>
	        <?php foreach(Yii::$app->session->getAllFlashes() as $type => $messages): ?>
		        <?php foreach($messages as $message): ?>
                    <div class="alert alert-<?= $type ?>" role="alert"><?= $message ?></div>
		        <?php endforeach ?>
	        <?php endforeach ?>
            <?php endif; ?>

        </div>
        <a href="?r=site/generate">Сгенерировать студентов</a><br>
        <a href="?r=site/drop-students">Удалить всех студентов</a>
    </div>
</div>
