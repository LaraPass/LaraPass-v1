<?php
namespace App\Helpers\Install;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

trait EnvironmentInstallerTrait
{
    /**
     * @var string
     */
    private $envPath;

    /**
     * Save the form content to the .env file.
     *
     * @param Request $request
     * @return string
     */
    public function saveEnvFile($request)
    {
        $envPath = base_path('.env');
        $results = 'success';
        $envFileData =
        'APP_NAME=\'' . $request->app_name . "'\n" .
        'APP_EMAIL=\'' . $request->app_email . "'\n" .
        'APP_ENV=' . $request->environment . "\n" .
        'APP_KEY=' . $request->key . "\n" .
        'APP_DEBUG=' . $request->app_debug . "\n" . 
        'APP_LOG_LEVEL=' . 'debug' . "\n" .
        'APP_URL=' . $request->app_url . "\n\n" .
        'DB_CONNECTION=' . $request->database_connection . "\n" .
        'DB_HOST=' . $request->database_hostname . "\n" .
        'DB_PORT=' . $request->database_port . "\n" .
        'DB_DATABASE=' . $request->database_name . "\n" .
        'DB_USERNAME=' . $request->database_username . "\n" .
        'DB_PASSWORD=' . $request->database_password . "\n\n" .
        'BROADCAST_DRIVER=' . $request->broadcast_driver . "\n" .
        'CACHE_DRIVER=' . $request->cache_driver . "\n" .
        'SESSION_DRIVER=' . $request->session_driver . "\n" .
        'SESSION_LIFETIME=' . $request->session_lifetime . "\n" .
        'QUEUE_DRIVER=' . $request->queue_driver . "\n\n" .
        'REDIS_HOST=' . '127.0.0.1' . "\n" .
        'REDIS_PASSWORD=' . 'null' . "\n" .
        'REDIS_PORT=' . '6379' . "\n\n" .
        'MAIL_DRIVER=' . $request->mail_driver . "\n" .
        'MAIL_HOST=' . $request->mail_host . "\n" .
        'MAIL_PORT=' . $request->mail_port . "\n" .
        'MAIL_USERNAME=' . $request->mail_username . "\n" .
        'MAIL_PASSWORD=' . $request->mail_password . "\n" .
        'MAIL_ENCRYPTION=' . $request->mail_encryption . "\n" .
        'MAILGUN_DOMAIN=' . $request->mailgun_domain . "\n" .
        'MAILGUN_SECRET=' . $request->mailgun_secret . "\n" .
        'MAIL_FROM_ADDRESS=' . $request->mail_sender . "\n" .
        'MAIL_FROM_NAME=\'' . $request->mail_sender_name . "'\n\n" .
        'PUSHER_APP_ID=' . '' . "\n" .
        'PUSHER_APP_KEY=' . '' . "\n" .
        'PUSHER_APP_SECRET=' . '';

        try {
            setting()->set('app_name', $request->app_name);
            setting()->set('app_email', $request->app_email);
            setting()->set('app_env', $request->environment);
            if($request->app_debug == 'false')
                setting()->set('app_debug', false);
            else
                setting()->set('app_debug', true);
            setting()->set('app_url', $request->app_url);
            setting()->set('db_default_type',$request->database_connection);
            setting()->set('db_mysql_host', $request->database_hostname);
            setting()->set('db_mysql_port', $request->database_port);
            setting()->set('db_mysql_database', $request->database_name);
            setting()->set('db_mysql_username', $request->database_username);
            setting()->set('db_mysql_password', $request->database_password);
            setting()->set('app_mail_driver',$request->mail_driver);
            setting()->set('app_mail_host', $request->mail_host);
            setting()->set('app_mail_port', $request->mail_port);
            setting()->set('app_mail_username', $request->mail_username);
            setting()->set('app_mail_password', $request->mail_password);
            setting()->set('app_mail_encryption', $request->mail_encryption);
            setting()->set('app_mail_sender', $request->mail_sender);
            setting()->set('app_mail_sender_name', $request->mail_sender_name);
            setting()->save();
            file_put_contents($envPath, $envFileData);
        }
        catch(Exception $e) {
            $results = $e->getMessage();
        }
        return $results;
    }
}