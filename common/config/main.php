<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'fileTransportPath' => '@common/runtime',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'talent.pool.0000@gmail.com',
                'password' => '1234@abcd',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
    ],
    'modules' => [
        'comment' => [
            'class' => 'yii2mod\comments\Module',
            // use comment controller event example
            'controllerMap' => [
                'default' => [
                    'class' => 'yii2mod\comments\controllers\DefaultController',
                    'on afterCreate' => function ($event) {
                        // get saved comment model
                        $event->getCommentModel();
                        // your custom code
                    }
                ]
            ]
        ]
    ],
];
