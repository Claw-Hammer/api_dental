<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to clear all notifications for all users';

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
     * @return int
     */
    public function handle()
    {
        // $clear = Notification::all()->where('status', '=', 1)->update('status', 0);

        $clear = DB::table('notifications')
            ->where('status', '1')
            ->update(['status' => '0']);

        return 0;
    }
}
