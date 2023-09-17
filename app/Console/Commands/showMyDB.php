<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class showMyDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // 명령의 이름 및 인수 정의
    //php artisan showMyDB
    protected $signature = 'showMyDB';

    /**
     * The console command description.
     *
     * @var string
     */
    // 명령에 대한 설명
    //php artisan list
    protected $description = 'This is my current Database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // 콘솔 명령이 실행될 때 수행할 작업을 이곳에 작성
        //php artisan showMyDB
        $this->info('Current DB: '.DB::connection()->getDatabaseName());
    }
}
