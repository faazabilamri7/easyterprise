<?php

namespace App\Observers;

use App\Models\TransaksiKeuangan;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class TransaksiKeuanganActionObserver
{
    public function created(TransaksiKeuangan $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'TransaksiKeuangan'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(TransaksiKeuangan $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'TransaksiKeuangan'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(TransaksiKeuangan $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'TransaksiKeuangan'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
