@component('mail::message')
    # New Task Assignment

    Hello {{ $employee->name ?? 'Employee'}},


    You have been assigned a new task

    **Title:** {{ $task->title }}
    **Description:** {{ $task->description }}
    **Status:** {{ $task->status }}


@endcomponent
