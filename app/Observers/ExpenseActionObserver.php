<?php

namespace App\Observers;

use App\Models\Expense;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ExpenseActionObserver
{
    public function created(Expense $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Expense'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Expense $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Expense'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Expense $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Expense'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
