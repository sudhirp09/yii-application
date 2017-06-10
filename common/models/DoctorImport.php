<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "doctor_import".
 *
 * @property integer $id
 * @property integer $page_no
 */
class DoctorImport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor_import';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_no'], 'required'],
            [['page_no'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_no' => 'Page No',
        ];
    }
}
