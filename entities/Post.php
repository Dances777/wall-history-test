<?php

namespace app\entities;

use app\helpers\IPHideHelper;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Html;

/**
 * @property int $id
 * @property string $user_id
 * @property string $author
 * @property string $message
 * @property string $ip
 * @property int $created_at
 */
class Post extends ActiveRecord
{
    public static function make($userId, $author, $message, $ip)
    {
        $entity = new static();
        $entity->user_id = $userId;
        $entity->author = $author;
        $entity->message = $message;
        $entity->ip = $ip;
        $entity->created_at = time();

        return $entity;
    }

    public function getAuthor()
    {
        return Html::encode($this->author);
    }

    public function getDisplayedIP()
    {
        return IPHideHelper::hide($this->ip);
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getFormattedDate()
    {
        return Yii::$app->formatter->asRelativeTime($this->created_at);
    }

    public static function tableName()
    {
        return 'post';
    }

}