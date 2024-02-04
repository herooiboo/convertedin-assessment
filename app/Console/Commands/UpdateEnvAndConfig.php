<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UpdateEnvAndConfig extends Command
{
    protected $signature = 'install:env
                            {--dbname= : The database name}
                            {--dbuser= : The database user}
                            {--dbpassword= : The database password}';

    protected $description = 'Update .env file and clear configuration cache';

    public function handle()
    {
        $this->callConfigClear();

        exec('cp .env.example .env');

        $dbname = $this->option('dbname');
        $dbuser = $this->option('dbuser');
        $dbpassword = $this->option('dbpassword');

        $this->updateEnvFile([
            'DB_DATABASE' => $dbname,
            'DB_USERNAME' => $dbuser,
            'DB_PASSWORD' => $dbpassword,
        ]);

        $this->callConfigClear();

        $this->info('.env file updated successfully.');

        // Your logic to use $dbname, $dbuser, and $dbpassword to perform assessment tasks
        // Example commands:
        $this->call('key:generate');

        $this->info('Configuration Updated Successfully');
    }

    protected function callConfigClear()
    {
        $this->call('config:clear');
        $this->call('config:cache');
    }

    protected function updateEnvFile(array $updates)
    {

        $envFilePath = base_path('.env');

        foreach ($updates as $key => $value) {
            $this->updateEnvVariable($envFilePath, $key, $value);
        }
    }

    protected function updateEnvVariable($envFilePath, $key, $value)
    {
        $contents = File::get($envFilePath);
        $after = Str::after($contents, "$key=");
        $oldValue = Str::before($after, "\n");
        $contents = str_replace("$key=$oldValue", "$key=$value", $contents);

        File::put($envFilePath, $contents);
    }
}