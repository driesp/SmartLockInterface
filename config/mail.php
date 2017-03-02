<?php

return [

  'driver' => env('MAIL_DRIVER', 'smtp'),
  'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
  'port' => env('MAIL_PORT', 587),
  'username' => env('MAIL_USERNAME'),
  'password' => env('MAIL_PASSWORD'),

  'from' => [
    'address' => env('MAIL_FROM_ADDRESS', 'support@smartlock.tk'),
    'name' => env('MAIL_FROM_NAME', 'SmartLock Support'),
  ],

    /*
    |--------------------------------------------------------------------------
    | Sendmail System Path
    |--------------------------------------------------------------------------
    |
    | When using the "sendmail" driver to send e-mails, we will need to know
    | the path to where Sendmail lives on this server. A default path has
    | been provided here, which will work well on most of your systems.
    |
    */

    'sendmail' => '/usr/sbin/sendmail -bs',

    /*
    |--------------------------------------------------------------------------
    | Markdown Mail Settings
    |--------------------------------------------------------------------------
    |
    | If you are using Markdown based email rendering, you may configure your
    | theme and component paths here, allowing you to customize the design
    | of the emails. Or, you may simply stick with the Laravel defaults!
    |
    */

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
