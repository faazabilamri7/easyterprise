<?php

namespace App\Observers;

use App\Models\PurchaseReturn;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class PurchaseReturnActionObserver
{
    public function created(PurchaseReturn $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'PurchaseReturn'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(PurchaseReturn $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'PurchaseReturn'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(PurchaseReturn $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'PurchaseReturn'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
