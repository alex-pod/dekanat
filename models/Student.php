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
	const GENERAL_FACULTY_LIMIT = 21;
	const ROBOTICS_MALE_FACULTY_LIMIT = 14;
	const NANO_FEMALE_FACULTY_LIMIT = 14;
	const ENGINEER_FACULTY_LIMIT = 11;

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

	public function baseStudentsLimit($f_id)
	{
		$query = Student::find()->where('faculty_id = :faculty_id', [':faculty_id' => $f_id]);
		if ($query->count() < self::GENERAL_FACULTY_LIMIT) {
			return true;
		}
		return false;
	}

	public function studentsLimitByFaculty($f_id, $sex)
	{
		$queryCount = Student::find()
		                ->where('faculty_id = :faculty_id', [':faculty_id' => $f_id])
						->andWhere('sex = :sex', [':sex' => $sex])
						->count();
		switch ($f_id) {
			case 1:
				if ($sex === 'male' && $queryCount >= self::ROBOTICS_MALE_FACULTY_LIMIT) {
					return false;
				}
				return true;
				break;
			case 2:
				if ($sex === 'female' && $queryCount >= self::NANO_FEMALE_FACULTY_LIMIT) {
					return false;
				}
				return true;
				break;
			case 3:
				if ($queryCount >= self::ENGINEER_FACULTY_LIMIT) {
					return false;
				}
				return true;
				break;
		}
	}

	public function getFaculty()
	{
		return $this->hasOne(Faculty::className(), ['id' => 'faculty_id']);
	}
}
