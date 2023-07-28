<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AddUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:users  {login} {password} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add users to the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        $login = $this->argument('login');
        $password = $this->argument('password');

        $user = new User();
        $user->name = $login;
        
        $user->password = Hash::make($password);
        $user->save();
    }
}
