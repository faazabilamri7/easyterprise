<?php

namespace App\Observers;

use App\Models\SalesQuotation;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class SalesQuotationActionObserver
{
    public function created(SalesQuotation $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'SalesQuotation'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(SalesQuotation $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'SalesQuotation'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(SalesQuotation $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'SalesQuotation'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
