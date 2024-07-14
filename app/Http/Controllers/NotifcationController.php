<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Notifcation;
use App\Models\NotifcationRead;
use App\Models\Trainer;
use App\Models\TraingingTrainers;
use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
class NotifcationController extends Controller
{



    public function markAsRead( $notifcation_id  )
    {


        $Notification                     = new  NotifcationRead () ;
        $Notification->notifcation_id     = $notifcation_id  ;
        $Notification->user_id            = auth()->id()   ;
        $Notification->read               = 1  ;
        $Notification->save() ;

        return back() ;


    }





 }

