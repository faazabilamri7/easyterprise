<?php

namespace App\Observers;

use App\Models\SalesInquiry;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class SalesInquiryActionObserver
{
    public function created(SalesInquiry $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'SalesInquiry'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(SalesInquiry $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'SalesInquiry'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(SalesInquiry $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'SalesInquiry'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
