<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "back_menu".
 *
 * @property int $nodeid
 * @property int $parentnodeid
 * @property int $page_id
 * @property string $nodeshortname
 * @property string $nodename
 * @property string $nodeurl
 * @property string $userstatus
 * @property int $nodeaccess
 * @property int $nodestatus
 * @property int $nodeorder
 * @property int $service_id
 * @property string $nodefile
 * @property string $nodeicon
 * @property string $ishasdivider
 * @property string $hasnotify
 * @property string $notifyscript
 * @property string $isforguest
 * @property string $arrow_tag
 * @property string $position
 */
class BackMenu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'back_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nodename', 'nodeurl'], 'required'],
            [['parentnodeid', 'nodeaccess', 'nodestatus', 'nodeorder', 'page_id'], 'integer'],
            [['ishasdivider', 'hasnotify', 'isforguest', 'position'], 'string'],
            [['nodeshortname', 'nodeicon'], 'string', 'max' => 50],
            [['nodename'], 'string', 'max' => 100],
            [['nodeurl', 'nodefile', 'notifyscript', 'arrow_tag'], 'string', 'max' => 255],
            [['userstatus'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nodeid' => 'Nodeid',
            'parentnodeid' => 'Parent',
            'nodeshortname' => 'Short Name',
            'nodename' => 'Name',
            'nodeurl' => 'Url',
            'userstatus' => 'User status',
            'nodeaccess' => 'Access',
            'nodestatus' => 'Status',
            'nodeorder' => 'Order',
            'nodefile' => 'Node file',
            'nodeicon' => 'Node icon',
            'ishasdivider' => 'Ishasdivider',
            'hasnotify' => 'Hasnotify',
            'notifyscript' => 'Notifyscript',
            'isforguest' => 'Isforguest',
            'arrow_tag' => 'Arrow Tag',
            'position' => 'Position',
        ];
    }

    public static function getItems(){
        $items = BackMenu::find()->where(['nodeaccess' => 1, 'parentnodeid' => 0])->asArray()->all();
        return $items;
    }
    public function setItemOrder($id){
        //after $id
        if(empty($id)){
            $id=-1;
        }
        if($id == -2){
            $this->nodeorder = 0;
            Yii::$app->db->createCommand('UPDATE back_menu SET nodeorder = nodeorder + 1')->execute();
        }elseif($id == -1){
            $lastItemOrder = $this::find()->max('nodeorder');
            $this->nodeorder = $lastItemOrder+1;
        }else{
            $id+=1;
            $this->nodeorder = $id;
            Yii::$app->db->createCommand('UPDATE back_menu SET nodeorder = nodeorder + 1 WHERE nodeorder >= '.$id)->execute();
        }
    }
    public function setMenuParentIdByPageId($pageParentId = 0){
        if(empty($pageParentId) || $pageParentId == 0){
            $this->parentnodeid = 0;
        }else{
            $data = static::find()->where(['page_id' => $pageParentId])->asArray()->one();
            $this->parentnodeid = $data['nodeid'];
        }
    }
    public function setUrlBySlug($slug = ''){
        $url = '/main/page/'.$slug;
        $this->nodeurl = $url;
    }
}
