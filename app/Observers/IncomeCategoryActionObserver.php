<?php

namespace App\Observers;

use App\Models\IncomeCategory;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class IncomeCategoryActionObserver
{
    public function created(IncomeCategory $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'IncomeCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(IncomeCategory $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'IncomeCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(IncomeCategory $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'IncomeCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
