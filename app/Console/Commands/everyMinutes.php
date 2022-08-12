<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserToken;

class everyMinutes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:cron';

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
        UserToken::where('end_verif','<',time())->delete();
    }
}
