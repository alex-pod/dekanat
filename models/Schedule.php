<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/5/17
 * Time: 7:39 PM
 */

namespace app\models;

use yii\db\ActiveRecord;

class Schedule extends ActiveRecord
{
	public function getFaculty()
	{
		return $this->hasOne(Faculty::className(), ['id' => 'faculty_id']);
	}

	public function getLecturer()
	{
		return $this->hasOne(Lecturer::className(), ['id' => 'lecturer_id']);
	}
}
