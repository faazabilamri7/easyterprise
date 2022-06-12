<?php

namespace App\Observers;

use App\Models\Akun;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class AkunActionObserver
{
    public function created(Akun $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Akun'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Akun $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Akun'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Akun $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Akun'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
