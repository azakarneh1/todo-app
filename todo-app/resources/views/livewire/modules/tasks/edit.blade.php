<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                     data-bs-target="#kt_account_question_details" aria-expanded="true"
                     aria-controls="kt_account_question_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Edit Task</h3>
                    </div>
                </div>

                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="update">
                        <div class="mb-3">
                            <label for="text" class="form-label">Text:</label>
                            <input type="text" class="form-control" id="text" wire:model="text"
                                   placeholder="Enter task text">
                            @error('text') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Assign User:</label>
                            <select class="form-control" wire:model="user_id" id="user_id">
                                <option value="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @selected($user->id == $user_id)>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('tasks') }}" class="btn btn-secondary me-2">Back</a>
                            <button type="submit" class="btn btn-primary">Update Task</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
