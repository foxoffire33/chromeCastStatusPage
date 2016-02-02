<?php

namespace common\models;

use common\components\db\ReleazActiveRecord;
use Yii;

/**
 * This is the model class for table "media".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $value
 * @property string $created
 * @property string $updated
 */
class Media extends ReleazActiveRecord
{
    const TYPE_WEATHER = 0;
    const TYPE_TWEET = 1;
    const TYPE_NIEUWS = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'media';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'value'], 'required'],
            [['type'], 'integer'],
            [['created', 'updated'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'value' => 'Value',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
