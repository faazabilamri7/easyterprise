<?php

namespace App\Observers;

use App\Models\BukuBesar;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class BukuBesarActionObserver
{
    public function created(BukuBesar $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'BukuBesar'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(BukuBesar $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'BukuBesar'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(BukuBesar $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'BukuBesar'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
