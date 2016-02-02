<?php

namespace common\models;

use common\components\db\ReleazActiveRecord;
use Yii;

/**
 * This is the model class for table "text_block".
 *
 * @property integer $id
 * @property string $title
 * @property string $created
 * @property string $updated
 */
class TextBlock extends ReleazActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'text_block';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['created', 'updated'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
    
    public function beforeDelete()
    {
        if(!empty($this->images)){
            foreach ($this->images as $image) {
                $image->delete();
            }
        }
        return parent::beforeDelete();
    }

    public function getImages(){
        return $this->hasMany(TextBlockIamge::classname(),['text_block_id' => 'id']);
    }

}
