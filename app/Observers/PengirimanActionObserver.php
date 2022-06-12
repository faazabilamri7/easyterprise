<?php

namespace App\Observers;

use App\Models\Pengiriman;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class PengirimanActionObserver
{
    public function created(Pengiriman $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Pengiriman'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Pengiriman $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Pengiriman'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Pengiriman $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Pengiriman'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
