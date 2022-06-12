<?php

namespace App\Observers;

use App\Models\Asset;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class AssetActionObserver
{
    public function created(Asset $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Asset'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Asset $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Asset'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Asset $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Asset'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
