<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "doctor_schedule_group".
 *
 * @property integer $id
 * @property integer $doctor_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property DoctorSchedule[] $doctorSchedules
 * @property Doctor $doctor
 */
class DoctorScheduleGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor_schedule_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doctor_id', 'created_at', 'updated_at'], 'required'],
            [['doctor_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doctor_id' => 'Doctor ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorSchedules()
    {
        return $this->hasMany(DoctorSchedule::className(), ['schedule_group' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'doctor_id']);
    }
}
