<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                     data-bs-target="#kt_account_question_details" aria-expanded="true"
                     aria-controls="kt_account_question_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Create User</h3>
                    </div>
                </div>

                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" wire:model="name"
                                   placeholder="Enter name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" wire:model="email"
                                   placeholder="Enter email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role:</label>
                            <select class="form-control text-muted" wire:model="role" id="role">
                                <option value="">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" wire:model="password"
                                   placeholder="Enter password">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('users') }}" class="btn btn-secondary me-2">Back</a>
                            <button type="submit" class="btn btn-primary">Create User</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
