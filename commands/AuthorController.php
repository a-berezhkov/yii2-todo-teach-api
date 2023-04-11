<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class AuthorController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

// add the rule
        $rule = new \app\rbac\AuthorRule;
        $auth->add($rule);

// добавляем разрешение "updateOwnPost" и привязываем к нему правило.
        $updateOwnPost = $auth->createPermission('updateOwnItem');
        $updateOwnPost->description = 'Update own item';
        $updateOwnPost->ruleName = $rule->name;
        $auth->add($updateOwnPost);


        $author = $auth->getRole("author");

// разрешаем "автору" обновлять его посты
        $auth->addChild($author, $updateOwnPost);
    }
}