<?php

/**
 * Created by PhpStorm.
 * User: reinier
 * Date: 02-02-16
 * Time: 10:02
 */
namespace common\components\db;

class ReleazActiveRecord extends \yii\db\ActiveRecord
{


    public function beforeSave($insert)
    {
        if ($this->hasAttribute('created') && $this->hasAttribute('updated')) {
            $date = date('Y-m-d H:i:s');
            if ($this->isNewRecord) {
                $this->created = $date;
            }
            $this->updated = $date;
        }
        return parent::beforeSave($insert);
    }


}