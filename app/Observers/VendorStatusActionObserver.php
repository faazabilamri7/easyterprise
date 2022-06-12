<?php

namespace App\Observers;

use App\Models\VendorStatus;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class VendorStatusActionObserver
{
    public function created(VendorStatus $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'VendorStatus'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(VendorStatus $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'VendorStatus'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(VendorStatus $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'VendorStatus'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
