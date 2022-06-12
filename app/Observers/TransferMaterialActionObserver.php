<?php

namespace App\Observers;

use App\Models\TransferMaterial;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class TransferMaterialActionObserver
{
    public function created(TransferMaterial $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'TransferMaterial'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(TransferMaterial $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'TransferMaterial'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(TransferMaterial $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'TransferMaterial'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
