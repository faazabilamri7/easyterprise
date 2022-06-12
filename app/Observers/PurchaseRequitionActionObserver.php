<?php

namespace App\Observers;

use App\Models\PurchaseRequition;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class PurchaseRequitionActionObserver
{
    public function created(PurchaseRequition $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'PurchaseRequition'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(PurchaseRequition $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'PurchaseRequition'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(PurchaseRequition $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'PurchaseRequition'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
