<?php

namespace App\Console\Commands;

use App\Models\Manager;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateManager extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:manager {username} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new manager';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $username = $this->argument('username');
        $password = Hash::make($this->argument('password'));

        Manager::create([
            'username' => $username,
            'password' => $password,
        ]);

        $this->info('Manager created successfully.');
    }
}
