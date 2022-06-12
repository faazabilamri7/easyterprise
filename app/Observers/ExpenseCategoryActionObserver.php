<?php

namespace App\Observers;

use App\Models\ExpenseCategory;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ExpenseCategoryActionObserver
{
    public function created(ExpenseCategory $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'ExpenseCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(ExpenseCategory $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'ExpenseCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(ExpenseCategory $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'ExpenseCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
