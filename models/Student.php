<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/2/17
 * Time: 2:38 PM
 */

namespace app\models;
use yii\db\ActiveRecord;

class Student extends ActiveRecord
{
	public static function tableName()
	{
		return 'students';
	}

	public function rules()
	{
		return [
			[['email', 'firstname', 'lastname', 'faculty_id', 'sex'], 'required'],
			[['email'], 'email'],
		];
	}

	public function attributeLabels()
	{
		return array(
			'email' => 'Email',
			'firstname' => 'Имя',
			'lastname' => 'Фамилия',
			'faculty_id' => 'Факультет',
			'sex' => 'Пол',
		);
	}

	public function countStudents($f_id)
	{
		$query = Student::find()->where('faculty_id = :faculty_id', [':faculty_id' => $f_id]);
		if ($query->count() < 21) {
			return true;
		}
		return false;
	}

	public function getFaculty()
	{
		return $this->hasOne(Faculty::className(), ['id' => 'faculty_id']);
	}
}