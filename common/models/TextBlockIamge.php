<?php

namespace common\models;

use common\components\db\ReleazActiveRecord;
use Yii;

/**
 * This is the model class for table "text_block_image".
 *
 * @property integer $id
 * @property integer $ticket_block_id
 * @property string $path
 * @property string $created
 * @property string $updated
 */
class TextBlockIamge extends ReleazActiveRecord
{

    public $imageFiles;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'text_block_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text_block_id', 'imageFiles'], 'required'],
            [['text_block_id'], 'integer'],
            [['created', 'updated','text_block_id'], 'safe'],
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg','maxFiles' => 4],
        ];
    }

    public function beforeValidate(){
        $this->text_block_id = intval($this->text_block_id);
        return parent::beforeValidate();
    }

    public function beforeDelete()
    {
        if (isset($this->path) && file_exists(\Yii::getAlias('@app') . '/../uploads/' . $this->path)) {
            unlink(\Yii::getAlias('@app') . '/../uploads/' . $this->path);
        }
        return parent::beforeDelete();
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ticket_block_id' => 'Ticket Block ID',
            'path' => 'Path',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
