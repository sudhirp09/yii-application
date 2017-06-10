<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\DoctorScheduleGroup]].
 *
 * @see \common\models\DoctorScheduleGroup
 */
class DoctorScheduleGroupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\DoctorScheduleGroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\DoctorScheduleGroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
