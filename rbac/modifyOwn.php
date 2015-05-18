<?php
/**
 * Created by PhpStorm.
 * User: liujunling
 * Date: 15/5/18
 * Time: 下午6:12
 */

namespace app\rbac;

use yii\rbac\Rule;

/**
 * Checks if authorID matches user passed via params
 */
class modifyOwn extends Rule
{
    public $name = 'modifyOwn';

    /**
     * @param string|integer $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['model']) ? $params['model']->userId == $user : false;
    }
}