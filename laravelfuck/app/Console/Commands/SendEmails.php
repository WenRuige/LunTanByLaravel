<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;
class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'emails:send {user} {--Q|queue=}';
        protected $signature='email:send {user : 用户的id} {--queue= :是否进入队列}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Send drip e-mails to a user";


    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
//
    }
}
