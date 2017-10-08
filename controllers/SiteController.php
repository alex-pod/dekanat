<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Student;
use Faker;

class SiteController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
	    $model = new Student();
        return $this->render('index', [
        	'model' => $model,
        ]);
    }

	/**
	 * Processes registration.
	 *
	 * @return string
	 */
	public function actionRegister() {
		$form = new Student();

		if ($form->load(Yii::$app->request->post()) && $form->validate()) {
			$post = Yii::$app->request->post();
			$f_id = (int) $post['Student']['faculty_id'];
			$sex = $post['Student']['sex'];

			if ($form->baseStudentsLimit($f_id) && $form->studentsLimitByFaculty($f_id, $sex)) {
				if ( $form->save() ) {
					Yii::$app->session->addFlash( 'success',
						'Пользователь зарегистрирован' );
					return $this->redirect( [ 'index' ] );
				} else {
					Yii::$app->session->addFlash( 'danger',
						"Пользователь не зарегистрирован" );
					return $this->redirect( [ 'index' ] );
				}
			} else {
				Yii::$app->session->addFlash( 'danger',
					'Факультет переполнен, попробуйте в следующем году' );
				return $this->redirect( [ 'index' ] );
			}
		}
	}

	public function actionGenerate()
	{
		while (!Student::isFullUniversity()) {
			$student  = new Student();
			$fakeUser = Faker\Factory::create( 'uk_UA' );

			$student->sex = $fakeUser->randomElement( $array = array( 'male', 'female' ) );

			if ( $student->sex == 'male' ) {
				$student->firstname = $fakeUser->firstNameMale;
			} else {
				$student->firstname = $fakeUser->firstNameFemale;
			}
			$student->lastname   = $fakeUser->lastName;
			$student->email      = $fakeUser->email;
			$student->faculty_id = rand( 1, 3 );

			if ( $student->baseStudentsLimit( $student->faculty_id )
			     && $student->studentsLimitByFaculty( $student->faculty_id, $student->sex )
			) {
				$student->save();
			}
		}
		Yii::$app->session->addFlash( 'success',
			'Пользователи сгенерированы' );
		return $this->redirect( [ 'index' ] );
	}

	public function actionDropStudents()
	{
		Student::dropStudents();
		Yii::$app->session->addFlash( 'success',
			'Пользователи удалены' );
		return $this->redirect( [ 'index' ] );
	}
}
