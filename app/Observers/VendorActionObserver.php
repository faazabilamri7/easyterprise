<?php

namespace App\Observers;

use App\Models\Vendor;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class VendorActionObserver
{
    public function created(Vendor $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Vendor'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Vendor $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Vendor'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Vendor $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Vendor'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
