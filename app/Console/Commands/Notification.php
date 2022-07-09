<?php


namespace App\Console\Commands;

use App\Mail\sendNotif;
use App\Models\Notifications;
use App\Models\Products;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail as FacadesMail;
use phpDocumentor\Reflection\Types\This;

class Notification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:cron';


    public function __construct()
    {
        parent::__construct();
    }
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
        $prods = Products::get();
        info($prods);

        if ($prods->count() > 0) {
            foreach ($prods as $key => $prod) {
                $user = User::find(1);
                $email = $user->email;
                //info($email);

                $rodi = alertExpiration($prod);
                if ($rodi[0]['message'] != '.') {
                    FacadesMail::to($email)->send(new sendNotif($prod));
                    info($prod->id);
                    Notifications::create([
                        'message' => $rodi[0]['message'],
                        'product_id' => $prod->id,
                    ]);
                }
            }
        }
    }
}