<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RunAssessment extends Command
{
    protected $signature = 'assessment:run';
    protected $description = 'Run the assessment commands';

    public function handle()
    {

        $this->call('config:clear');
        $this->call('config:cache');
        exec('composer update');
        $this->call('migrate', ['--force' => true]);
        $this->call('db:seed');
        $this->info('App Works Now ;)');
        $this->call('queue:work');
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