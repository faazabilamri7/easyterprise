<?php

namespace App\Observers;

use App\Models\PurchaseInq;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class PurchaseInqActionObserver
{
    public function created(PurchaseInq $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'PurchaseInq'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(PurchaseInq $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'PurchaseInq'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(PurchaseInq $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'PurchaseInq'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
