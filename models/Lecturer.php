<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/5/17
 * Time: 7:49 PM
 */

namespace app\models;

use yii\db\ActiveRecord;

class Lecturer extends ActiveRecord
{
	public static function tableName()
	{
		return 'lecturers';
	}
}
