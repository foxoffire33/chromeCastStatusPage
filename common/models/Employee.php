<?php

namespace common\models;

use common\components\db\ReleazActiveRecord;
use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $image
 * @property resource $text
 * @property string $created
 * @property string $updated
 */
class Employee extends ReleazActiveRecord
{
    const STATUS_HIDE = 0;
    const STATUS_SHOW = 1;

    public $virtualImage;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status', 'text'], 'required'],
            [['status'], 'integer'],
            [['text'], 'string'],
            [['created', 'updated', 'image', 'virtualImage'], 'safe'],
            [['name'], 'string', 'max' => 128],
            [['image'], 'string', 'max' => 255],
            [['status'], 'in', 'range' => [self::STATUS_HIDE, self::STATUS_SHOW]],
            [['virtualImage'], 'file', 'extensions' => 'png, jpg', 'skipOnEmpty' => false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'image' => 'Image',
            'text' => 'Text',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    public function beforeDelete()
    {
        if (isset($this->image) && file_exists(\Yii::getAlias('@app') . '/../uploads/' . $this->image)) {
            unlink(\Yii::getAlias('@app') . '/../uploads/' . $this->image);
        }
        return parent::beforeDelete();
    }

}
