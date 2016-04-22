<?php

namespace app\models;
use Yii;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Message\Text;

class Wechat extends Application
{
    protected static $_instances = []; 

    public static function Load($conf = null)
    {
        if ($conf === null) {
            $conf = Yii::$app->params['wechat'];
        }
        if (!isset(self::$_instances[$conf['app_id']])) {
            self::$_instances[$conf['app_id']] = new self($conf);
        }
        return self::$_instances[$conf['app_id']];
    }

    /**
     * response to wechat
     * @todo not finished yet
     * @return null null
     */
    public function run()
    {
        $server = $this->server;
        $server->setMessageHandler(function ($message) {
            $text = new Text(['content' => '您好～ 来看看我们的网站吧: http://hongyaowan.com   有什么建议可以给我发邮件呦~ nosql@icloud.com']);
            return $text;
        });
        $server->serve()->send();
    }
}
