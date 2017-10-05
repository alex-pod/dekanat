<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/5/17
 * Time: 7:42 PM
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\Schedule;

class ScheduleController extends Controller
{
	public function actionIndex()
	{
		$schedule = Schedule::find()
		                ->with('faculty')
						->with('lecturer')
						->all();

		return $this->render('index', [
			'schedule' => $schedule,
		]);
	}
}
