<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/2/17
 * Time: 2:35 PM
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\Student;
use yii\data\Pagination;

class StudentController extends Controller
{
	public function actionIndex()
	{
		$query = Student::find()
		                ->select('firstname, lastname, email, faculty_id')
						->with('faculty');
		$pages = new Pagination([
			'totalCount' => $query->count(),
			'pageSize' => 30,
			'pageSizeParam' => false,
			'forcePageParam' => false
		]);
		$students = $query->offset($pages->offset)->limit($pages->limit)->all();

		return $this->render('index', [
			'students' => $students,
			'pages' => $pages,
		]);
	}

	public function actionTile()
	{
		$query = Student::find()
		                ->select('firstname, lastname, email, faculty_id')
		                ->with('faculty');
		$pages = new Pagination([
			'totalCount' => $query->count(),
			'pageSize' => 12,
			'pageSizeParam' => false,
			'forcePageParam' => false
		]);
		$students = $query->offset($pages->offset)->limit($pages->limit)->all();

		return $this->render('tile', [
			'students' => $students,
			'pages' => $pages,
		]);
	}
}