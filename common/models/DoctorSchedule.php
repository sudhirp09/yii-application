<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "doctor_schedule".
 *
 * @property integer $id
 * @property integer $doctor_id
 * @property integer $clinic_id
 * @property integer $schedule_group
 * @property integer $day
 * @property string $start_date
 * @property string $end_date
 * @property string $start_time
 * @property string $end_time
 * @property string $timezone
 * @property string $utc_start_time
 * @property string $utc_end_time
 * @property integer $utc_day
 * @property string $duration
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Clinic $clinic
 * @property DoctorScheduleGroup $scheduleGroup
 * @property Doctor $doctor
 * @property PatientAppointment[] $patientAppointments
 */
class DoctorSchedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doctor_id', 'clinic_id', 'schedule_group', 'day', 'utc_day'], 'integer'],
            [['clinic_id', 'schedule_group', 'start_date', 'end_date', 'timezone', 'utc_start_time', 'utc_end_time', 'utc_day'], 'required'],
            [['start_date', 'end_date', 'start_time', 'end_time', 'utc_start_time', 'utc_end_time', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'string'],
            [['timezone'], 'string', 'max' => 250],
            [['duration'], 'string', 'max' => 10],
            [['clinic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clinic::className(), 'targetAttribute' => ['clinic_id' => 'id']],
            [['schedule_group'], 'exist', 'skipOnError' => true, 'targetClass' => DoctorScheduleGroup::className(), 'targetAttribute' => ['schedule_group' => 'id']],
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
            'clinic_id' => 'Clinic ID',
            'schedule_group' => 'Schedule Group',
            'day' => 'Day',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'timezone' => 'Timezone',
            'utc_start_time' => 'Utc Start Time',
            'utc_end_time' => 'Utc End Time',
            'utc_day' => 'Utc Day',
            'duration' => 'Duration',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClinic()
    {
        return $this->hasOne(Clinic::className(), ['id' => 'clinic_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScheduleGroup()
    {
        return $this->hasOne(DoctorScheduleGroup::className(), ['id' => 'schedule_group']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'doctor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientAppointments()
    {
        return $this->hasMany(PatientAppointment::className(), ['doctor_schedule_id' => 'id']);
    }
}
