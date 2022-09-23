<?php

namespace App\Console\Commands;

use App\Criteria\WhereCriteria;
use App\Repositories\EmployeeRepository;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LastDayOrLeft extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lastday:left';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Employee last date it will show and once he left it will show as left';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public $repository;
    public function __construct(EmployeeRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("Job Started");
        $today = Carbon::now();
        $today = explode(' ', date($today));
        $today[1] = "00:00:00";
        $today = implode(" ",$today);
        if (isset($today)) {
            DB::enableQueryLog();
            //$this->repository->pushCriteria(new WhereCriteria('date_of_leaving', $today));
            $data = $this->repository->all();
            foreach($data as $key => $value){
                if($value['date_of_leaving'] != $today){
                    unset($data[$key]);
                }
            }
            Log::alert($data);
            //Log::alert(DB::getQueryLog());
        }
    }
}
