<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "doctor_license".
 *
 * @property integer $id
 * @property integer $doctor_id
 * @property integer $country_id
 * @property integer $state_id
 * @property string $expiration_date
 * @property string $status
 * @property string $created_at
 *
 * @property Country $country
 * @property Doctor $doctor
 * @property State $state
 */
class DoctorLicense extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor_license';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doctor_id', 'country_id', 'state_id'], 'integer'],
            [['status'], 'string'],
            [['created_at'], 'safe'],
            [['expiration_date'], 'string', 'max' => 10],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'country_id']],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['state_id' => 'id']],
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
            'country_id' => 'Country ID',
            'state_id' => 'State ID',
            'expiration_date' => 'Expiration Date',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id']);
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
    public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }
}
