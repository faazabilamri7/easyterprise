<?php

namespace App\Observers;

use App\Models\JurnalUmum;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class JurnalUmumActionObserver
{
    public function created(JurnalUmum $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'JurnalUmum'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(JurnalUmum $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'JurnalUmum'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(JurnalUmum $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'JurnalUmum'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
