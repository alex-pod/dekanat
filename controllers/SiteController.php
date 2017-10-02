<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Student;

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

			if ($form->countStudents($f_id)) {
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
				Yii::$app->session->addFlash( 'success',
					'Факультет переполнен, попробуйте в следующем году' );
				return $this->redirect( [ 'index' ] );
			}
		}
	}
}
