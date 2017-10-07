<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/2/17
 * Time: 3:02 PM
 */

namespace app\models;

use yii\db\ActiveRecord;

class Faculty extends ActiveRecord
{
	public static function tableName()
	{
		return 'faculties';
	}

	public static function countFaculties()
	{
		return Faculty::find()->count();
	}

}
