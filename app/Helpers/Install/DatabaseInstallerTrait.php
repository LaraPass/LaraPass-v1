<?php

namespace App\Helpers\Install;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

trait DatabaseInstallerTrait
{
    /**
     * Migrate and seed the database.
     *
     * @return array
     */
    public function migrateAndSeed()
    {
        Artisan::call('config:cache', ['--no-interaction' => true]);
        $outputLog = new BufferedOutput();

        return $this->migrate($outputLog);
    }

    /**
     * Run the migration and call the seeder.
     *
     * @param \Symfony\Component\Console\Output\BufferedOutput $outputLog
     *
     * @return array
     */
    private function migrate(BufferedOutput $outputLog)
    {
        try {
            Artisan::call('migrate', ['--force'=> true], $outputLog);
        } catch (Exception $e) {
            return $this->response($e->getMessage(), 'error', $outputLog);
        }

        return $this->seed($outputLog);
    }

    /**
     * Seed the database.
     *
     * @param \Symfony\Component\Console\Output\BufferedOutput $outputLog
     *
     * @return array
     */
    private function seed(BufferedOutput $outputLog)
    {
        try {
            Artisan::call('db:seed', ['--force' => true], $outputLog);
        } catch (Exception $e) {
            return $this->response($e->getMessage(), 'error', $outputLog);
        }

        return $this->response('Database Setup Complete.', 'success', $outputLog);
    }

    /**
     * Return a formatted error messages.
     *
     * @param string                                           $message
     * @param string                                           $status
     * @param \Symfony\Component\Console\Output\BufferedOutput $outputLog
     *
     * @return array
     */
    private function response($message, $status = 'danger', BufferedOutput $outputLog)
    {
        return [
            'status'      => $status,
            'message'     => $message,
            'dbOutputLog' => $outputLog->fetch(),
        ];
    }
}
