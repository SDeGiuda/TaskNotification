
@component('mail::message')
    # Task Was Assigned to someone else

    Hello {{ $employee->name ?? 'Employee'}},

    You dont need to worry about this task no more. Task:

    **Title:** {{ $task->title }}
    **Description:** {{ $task->description }}
    **Status:** {{ $task->status }}

@endcomponent
