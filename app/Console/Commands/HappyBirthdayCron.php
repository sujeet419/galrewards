<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Config;
use Illuminate\Console\Command;
use App\Models\register;
use Mail;
use \Carbon\Carbon;
use App\Mail\HappyBirthdayMail;

class HappyBirthdayCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'happybirthday:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = register::whereMonth('date_of_birth', '=', date('m'))->whereDay('date_of_birth', '=', date('d'))->get();
        
        foreach($users as $key => $user)
        {
            $email = $user->email;


            
            

            Mail::to($email)->send(new HappyBirthdayMail($user));
        }
    }
}