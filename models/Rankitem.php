<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rankitem".
 *
 * @property integer $id
 * @property integer $productId
 * @property integer $rankId
 * @property string $reason
 *
 * @property Product $product
 * @property Ranklist $rank
 */
class Rankitem extends Base
{

    /**
     * these are flags that are used by the form to dictate how the loop will handle each item
     */
    const UPDATE_TYPE_CREATE = 'create';
    const UPDATE_TYPE_UPDATE = 'update';
    const UPDATE_TYPE_DELETE = 'delete';
 
    const SCENARIO_BATCH_UPDATE = 'batchUpdate';

    private $_updateType;
 
    public function getUpdateType()
    {
        if (empty($this->_updateType)) {
            if ($this->isNewRecord) {
                $this->_updateType = self::UPDATE_TYPE_CREATE;
            } else {
                $this->_updateType = self::UPDATE_TYPE_UPDATE;
            }
        }
 
        return $this->_updateType;
    }
 
    public function setUpdateType($value)
    {
        $this->_updateType = $value;
    }
 
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rankitem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['updateType', 'required', 'on' => self::SCENARIO_BATCH_UPDATE],
            ['updateType',
                'in',
                'range' => [self::UPDATE_TYPE_CREATE, self::UPDATE_TYPE_UPDATE, self::UPDATE_TYPE_DELETE],
                'on' => self::SCENARIO_BATCH_UPDATE
            ],
            ['rankId', 'required', 'except' => self::SCENARIO_BATCH_UPDATE],
            [['productId', 'reason'], 'required'],
            [['productId'], 'integer'],
            [['reason'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'productId' => '产品ID',
            'rankId' => '排行榜ID',
            'reason' => '推荐原因',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'productId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRank()
    {
        return $this->hasOne(Ranklist::className(), ['id' => 'rankId']);
    }

    public function format() {
        $attr = $this->getAttributes();
        $attr['product'] = $this->product->format();
        return $attr;
    }
}
