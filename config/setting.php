<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable / Disable auto save
    |--------------------------------------------------------------------------
    |
    | Auto-save every time the application shuts down
    |
    */
	'auto_save'			=> true,

    /*
    |--------------------------------------------------------------------------
    | Setting driver
    |--------------------------------------------------------------------------
    |
    | Select where to store the settings.
    |
    | Supported: "database", "json"
    |
    */
	'driver'			=> 'json',

    /*
    |--------------------------------------------------------------------------
    | Database driver
    |--------------------------------------------------------------------------
    |
    | Options for database driver. Enter which connection to use, null means
    | the default connection. Set the table and column names.
    |
    */
	'database' => [
        'connection'    => null,
        'table'         => 'settings',
        'key'           => 'key',
        'value'         => 'value',
    ],

    /*
    |--------------------------------------------------------------------------
    | JSON driver
    |--------------------------------------------------------------------------
    |
    | Options for json driver. Enter the full path to the .json file.
    |
    */
	'json' => [
        'path'          => storage_path().'/settings.json',
    ],

    /*
    |--------------------------------------------------------------------------
    | Override application config values
    |--------------------------------------------------------------------------
    |
    | If defined, settings package will override these config values.
    |
    | Sample:
    |   "app.fallback_locale",
    |   "app.locale" => "settings.locale",
    |
    */
    'override' => [
        "app.name" => "app_name",
        "app.env" => "app_env",
        "app.debug" => "app_debug",
        "app.url" => "app_url",
        "mail.driver" => "app_mail_driver",
        "mail.host" => "app_mail_host",
        "mail.port" => "app_mail_port",
        "mail.from.address" => "app_mail_sender",
        "mail.from.name" => "app_mail_sender_name",
        "mail.encryption" => "app_mail_encryption",
        "mail.username" => "app_mail_username",
        "mail.password" => "app_mail_password",
        "mail.mailgun.domain" => "mailgun_domain",
        "mail.mailgun.secret" => "mailgun_secret",
        "database.default" => "db_default_type",
        "database.mysql.host" => "db_mysql_host",
        "database.mysql.port" => "db_mysql_port",
        "database.mysql.database" => "db_mysql_database",
        "database.mysql.username" => "db_mysql_username",
        "database.mysql.password" => "db_mysql_password",
        "database.connections.mysql.dump.dump_binary_path" => "app_mysql_dump_path",
        "captcha.secretKey" => "recaptcha_secret_key",
        "captcha.siteKey" => "recaptcha_site_key",
    ],
];
