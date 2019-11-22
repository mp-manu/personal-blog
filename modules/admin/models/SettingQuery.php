<?php

namespace app\modules\admin\models;

use yii\db\ActiveQuery;
use app\modules\admin\models\enumerables\SettingStatus;

/**
 * Class SettingQuery
 *
 * @package yii2mod\settings\models
 */
class SettingQuery extends ActiveQuery
{
    /**
     * Scope for settings with active status
     *
     * @return $this
     */
    public function active()
    {
        return $this->andWhere(['status' => SettingStatus::ACTIVE]);
    }

    /**
     * Scope for settings with inactive status
     *
     * @return $this
     */
    public function inactive()
    {
        return $this->andWhere(['status' => SettingStatus::INACTIVE]);
    }
}
