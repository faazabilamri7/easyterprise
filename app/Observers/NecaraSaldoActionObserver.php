<?php

namespace App\Observers;

use App\Models\NecaraSaldo;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class NecaraSaldoActionObserver
{
    public function created(NecaraSaldo $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'NecaraSaldo'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(NecaraSaldo $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'NecaraSaldo'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(NecaraSaldo $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'NecaraSaldo'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
