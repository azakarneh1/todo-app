<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <!-- Filtering Input for Email -->
                    <div class="mb-4">
                        <input
                            type="text"
                            id="emailFilter"
                            class="form-control"
                            wire:model.live.debounce.250ms="emailFilter"
                            placeholder="Enter email to filter"
                        >
                    </div>

                    @if(auth()->user()->isAdmin())
                        <div class="me-2" data-kt-customer-table-toolbar="base">
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="alert alert-success text-center mb-4 mt-3 w-100">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>

                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <thead>
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-50px">ID</th>
                            <th class="min-w-100px">Text</th>
                            <th class="min-w-100px">Assigned User</th>
                            <th class="min-w-50px">Created At</th>
                            @if(auth()->user()->isAdmin())
                                <th class="text-center min-w-70px">Actions</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                        @foreach($tasks as $task)
                            @php/** @var \App\Models\Task $user */ @endphp
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->text }}</td>
                                <td>{{ $task->user?->email }}</td>
                                <td>{{ $task->created_at->format('Y-m-d') }}</td>
                                @if(auth()->user()->isAdmin())
                                    <td class="text-center">
                                        <div class="dropdown" wire:ignore>
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a href="{{ route('tasks.edit', $task->id) }}" class="dropdown-item">Edit</a>
                                                <a href="javascript:void(0);" class="dropdown-item"
                                                   wire:click="delete({{ $task->id }})">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $tasks->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
