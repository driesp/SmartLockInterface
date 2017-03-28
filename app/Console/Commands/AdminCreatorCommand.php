<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class AdminCreatorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'creates a first time use administrator user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $questions = [
          'e-mail:', 'password:', 'telephone number:', 'Address:'
        ];
        $answers = [];
        foreach ($questions as $question)
        {
          $answer = $this->ask($question);
          array_push($answers,$answer);
        }
        
        User::create(['name' => 'Admin', 'email' => $answers[0], 'password' => bcrypt($answers[1]), 'function' => 'Admin', 'department' => 'Admin', 'telephone' => $answers[2], 'address' => $answers[3], 'admin' => 1]);

        $this->line('Admin Created!');
    }
}
