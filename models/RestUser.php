<?php


namespace app\models;


class RestUser extends User
{
    public function fields()
    {
        $fields = parent::fields();

        // удаляем небезопасные поля
        unset($fields['password_hash']);

        return $fields;
    }
}