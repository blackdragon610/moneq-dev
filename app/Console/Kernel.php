<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Models\UserPayment;
use App\Models\User;
use App\Models\Post;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        //Commands\ReservationCheckCommand::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function () {

            $payModels = UserPayment::orderBy('updated_at')->get();
            foreach($payModels as $payModel){
                $userModel = User::where('id', $payModel->user_id)->first();

                if($userModel){
                    $status = $userModel->pay_status;
                    if($status == 2){
                        $payDate = $payModel->updated_at;

                        $earlier = new \DateTime($payDate);
                        $later = new \DateTime();

                        $diff = $later->diff($earlier)->format("%a");

                        if($diff > 365){
                            $payDate->autoCreditsPayment();
                        }
                    }

                    if($status == 3){
                        $payDate = $payModel->updated_at;

                        $earlier = new \DateTime($payDate);
                        $later = new \DateTime();

                        $diff = $later->diff($earlier);

                        $moth = ($diff->y * 12) + $diff->m;

                        if($moth > 0){
                            $payDate->autoCarriorPayment();
                        }
                    }
                }
            }

            $models = Post::whereRaw("floor(datediff(curdate(),updated_at)) > 5 and status='2'")->get();
            foreach($models as $model){
                if($model->answerCount() == 0){
                    $userModel = User::where('id', $model->user_id)->first();
                    $count = $userModel->re_point;
                    $count++;
                    $userModel->re_point = $count;
                    $userModel->save();
                    $model->delete();
                }
            }


        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
