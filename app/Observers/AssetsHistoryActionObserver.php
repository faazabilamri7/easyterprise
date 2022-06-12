<?php

namespace App\Observers;

use App\Models\AssetsHistory;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class AssetsHistoryActionObserver
{
    public function created(AssetsHistory $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'AssetsHistory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(AssetsHistory $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'AssetsHistory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(AssetsHistory $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'AssetsHistory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
