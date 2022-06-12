<?php

namespace App\Observers;

use App\Models\RequestForQuotation;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class RequestForQuotationActionObserver
{
    public function created(RequestForQuotation $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'RequestForQuotation'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(RequestForQuotation $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'RequestForQuotation'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(RequestForQuotation $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'RequestForQuotation'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
