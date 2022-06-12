<?php

namespace App\Observers;

use App\Models\Material;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class MaterialActionObserver
{
    public function created(Material $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Material'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Material $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Material'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Material $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Material'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
