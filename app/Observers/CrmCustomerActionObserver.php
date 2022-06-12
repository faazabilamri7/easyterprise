<?php

namespace App\Observers;

use App\Models\CrmCustomer;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class CrmCustomerActionObserver
{
    public function created(CrmCustomer $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'CrmCustomer'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(CrmCustomer $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'CrmCustomer'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(CrmCustomer $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'CrmCustomer'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
