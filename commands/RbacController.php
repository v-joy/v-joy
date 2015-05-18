<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // add  roles
        $shopOwner = $auth->createRole('shopOwner');
        $shopOwner->description = "店主";
        $auth->add($shopOwner);

        $admin = $auth->createRole('admin');
        $admin->description = "管理员";
        $auth->add($admin);

        $superAdmin = $auth->createRole('superAdmin');
        $superAdmin->description = "超级管理员";
        $auth->add($superAdmin);

        // add permissions

        /*      类别   */
        $permission = $auth->createPermission('category/index');
        $permission->description = '类别主页';
        $auth->add($permission);
        $auth->addChild($admin, $permission);

        $permission = $auth->createPermission('category/create');
        $permission->description = '创建类别';
        $auth->add($permission);
        $auth->addChild($admin, $permission);

        $permission = $auth->createPermission('category/view');
        $permission->description = '查看类别';
        $auth->add($permission);
        $auth->addChild($shopOwner, $permission);

        $permission = $auth->createPermission('category/update');
        $permission->description = '修改类别';
        $auth->add($permission);
        $auth->addChild($admin, $permission);

        $permission = $auth->createPermission('category/delete');
        $permission->description = '删除类别';
        $auth->add($permission);
        $auth->addChild($admin, $permission);

        /*      文章   */
        $permission = $auth->createPermission('article/index');
        $permission->description = '文章主页';
        $auth->add($permission);
        $auth->addChild($admin, $permission);

        $permission = $auth->createPermission('article/create');
        $permission->description = '创建文章';
        $auth->add($permission);
        $auth->addChild($admin, $permission);

        $permission = $auth->createPermission('article/view');
        $permission->description = '查看文章';
        $auth->add($permission);
        $auth->addChild($admin, $permission);

        $permission = $auth->createPermission('article/update');
        $permission->description = '修改文章';
        $auth->add($permission);
        $auth->addChild($admin, $permission);

        $permission = $auth->createPermission('article/delete');
        $permission->description = '删除文章';
        $auth->add($permission);
        $auth->addChild($admin, $permission);

        /*      产品   */
        $permission = $auth->createPermission('product/index');
        $permission->description = '产品主页';
        $auth->add($permission);
        $auth->addChild($shopOwner, $permission);

        $permission = $auth->createPermission('product/create');
        $permission->description = '创建产品';
        $auth->add($permission);
        $auth->addChild($shopOwner, $permission);

        $permission = $auth->createPermission('product/view');
        $permission->description = '查看产品';
        $auth->add($permission);
        $auth->addChild($shopOwner, $permission);

        $permission = $auth->createPermission('product/update');
        $permission->description = '修改产品';
        $auth->add($permission);
        $auth->addChild($shopOwner, $permission);

        $permission = $auth->createPermission('product/delete');
        $permission->description = '删除产品';
        $auth->add($permission);
        $auth->addChild($shopOwner, $permission);


        /*      用户   */
        $permission = $auth->createPermission('user/index');
        $permission->description = '用户主页';
        $auth->add($permission);
        $auth->addChild($superAdmin, $permission);

        $permission = $auth->createPermission('user/create');
        $permission->description = '创建用户';
        $auth->add($permission);
        $auth->addChild($superAdmin, $permission);

        $permission = $auth->createPermission('user/view');
        $permission->description = '查看用户';
        $auth->add($permission);
        $auth->addChild($superAdmin, $permission);

        $permission = $auth->createPermission('user/update');
        $permission->description = '修改用户';
        $auth->add($permission);
        $auth->addChild($superAdmin, $permission);

        $permission = $auth->createPermission('user/delete');
        $permission->description = '删除用户';
        $auth->add($permission);
        $auth->addChild($superAdmin, $permission);

        $auth->addChild($admin, $shopOwner);
        $auth->addChild($superAdmin, $admin);

        //添加特殊权限： 只能修改自己穿件的信息

        // add the rule
        $rule = new \app\rbac\modifyOwn();
        $auth->add($rule);

        // add the "updateOwnPost" permission and associate the rule with it.
        $updateOwn = $auth->createPermission('modifyOwn');
        $updateOwn->description = '管理自己的信息';
        $updateOwn->ruleName = $rule->name;
        $auth->add($updateOwn);

        $auth->addChild($shopOwner, $updateOwn);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($shopOwner, 3);
        $auth->assign($admin, 2);
        $auth->assign($superAdmin, 1);
    }
}