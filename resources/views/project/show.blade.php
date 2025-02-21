@include('nav')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Project Details</h1>

    <a href="{{ route('projects.index') }}" class="btn btn-secondary mb-3">Back to Projects</a>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $project->name }}</h5>
            <p class="card-text">{{ $project->description }}</p>
            <p class="card-text">{{ $project->user->name }}</p>
        </div>
    </div>

    <h2 class="mb-3">Tasks</h2>
    <a href="{{ route('projects.tasks.create', $project->id) }}" class="btn btn-success mb-3">Add Task</a>

    @if ($project->tasks->isEmpty())
        <div class="alert alert-info">No tasks found for this project.</div>
    @else
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($project->tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td> {{ $task->due_date ? $task->due_date->format('Y-m-d') : 'N/A' }}</td>
                    @auth
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this task?')">Delete
                                </button>
                            </form>
                        </td>
                    @endauth
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif
</div>
</body>
