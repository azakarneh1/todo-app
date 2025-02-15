<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                     data-bs-target="#kt_account_question_details" aria-expanded="true"
                     aria-controls="kt_account_question_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Edit User</h3>
                    </div>
                </div>

                <div id="kt_account_settings_user_details">
                    <form wire:submit.prevent="update" class="form">
                        <div class="card-body border-top p-9">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <div class="row mb-6">
                                <label for="name" class="col-lg-4 col-form-label required fw-bold fs-6">Name:</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" id="name" wire:model.defer="name"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="Enter name">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label for="email" class="col-lg-4 col-form-label required fw-bold fs-6">Email:</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="email" id="email" wire:model.defer="email"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="Enter email">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label for="role" class="col-lg-4 col-form-label required fw-bold fs-6">Role:</label>
                                <div class="col-lg-8 fv-row">
                                    <select id="role" class="form-select form-control-lg form-control-solid"
                                            wire:model.defer="role">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                    @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label for="password"
                                       class="col-lg-4 col-form-label required fw-bold fs-6">Password:</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="password" id="password" wire:model.defer="password"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="Enter password">
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <a href="{{ route('users') }}" class="btn btn-secondary me-2">Back</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
