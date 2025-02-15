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

{{--                <div>--}}
{{--                    @if (session()->has('message'))--}}
{{--                        <div class="alert alert-success">--}}
{{--                            {{ session('message') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    <form wire:submit.prevent="update">--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="name" class="form-label">Name:</label>--}}
{{--                            <input type="text" class="form-control" id="name" wire:model="name"--}}
{{--                                   placeholder="Enter name">--}}
{{--                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                        </div>--}}

{{--                        <div class="mb-3">--}}
{{--                            <label for="email" class="form-label">Email:</label>--}}
{{--                            <input type="email" class="form-control" id="email" wire:model="email"--}}
{{--                                   placeholder="Enter email">--}}
{{--                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                        </div>--}}

{{--                        <!-- Role Selection -->--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="role" class="form-label">Role:</label>--}}
{{--                            <select id="role" class="form-select" wire:model="role">--}}
{{--                                <option value="admin">Admin</option>--}}
{{--                                <option value="user">User</option>--}}
{{--                            </select>--}}
{{--                            @error('role') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                        </div>--}}

{{--                        <!-- Password Field -->--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="password" class="form-label">Password:</label>--}}
{{--                            <input type="password" class="form-control" id="password" wire:model="password"--}}
{{--                                   placeholder="Enter password">--}}
{{--                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                        </div>--}}

{{--                        <div class="d-flex justify-content-end">--}}
{{--                            <a href="{{ route('users') }}" class="btn btn-secondary me-2">Back</a>--}}
{{--                            <button type="submit" class="btn btn-primary">Save</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}


                                <div id="kt_account_settings_question_details">
                                    <form wire:submit.prevent="update" class="form">
                                        <div class="card-body border-top p-9">
                                            @if (session()->has('message'))
                                                <div class="alert alert-success">
                                                    {{ session('message') }}
                                                </div>
                                            @endif

                                            <div class="row mb-6">
                                                <label for="question_en" class="col-lg-4 col-form-label required fw-bold fs-6">Question
                                                    (English):</label>
                                                <div class="col-lg-8 fv-row">
                                                    <input type="text" id="question_en" wire:model.defer="question_en" required
                                                           class="form-control form-control-lg form-control-solid"
                                                           placeholder="Enter English question"/>
                                                    @error('question_en') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-6">
                                                <label for="question_ar" class="col-lg-4 col-form-label required fw-bold fs-6">Question
                                                    (Arabic):</label>
                                                <div class="col-lg-8 fv-row">
                                                    <input type="text" id="question_ar" wire:model.defer="question_ar" required
                                                           class="form-control form-control-lg form-control-solid"
                                                           placeholder="Enter Arabic question"/>
                                                    @error('question_ar') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-6">
                                                <label for="description_en" class="col-lg-4 col-form-label fw-bold fs-6">Description
                                                    (English):</label>
                                                <div class="col-lg-8 fv-row">
                                                    <textarea id="description_en" wire:model.defer="description_en"
                                                              class="form-control form-control-lg form-control-solid"
                                                              placeholder="Enter English description"></textarea>
                                                    @error('description_en') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-6">
                                                <label for="description_ar" class="col-lg-4 col-form-label fw-bold fs-6">Description
                                                    (Arabic):</label>
                                                <div class="col-lg-8 fv-row">
                                                    <textarea id="description_ar" wire:model.defer="description_ar"
                                                              class="form-control form-control-lg form-control-solid"
                                                              placeholder="Enter Arabic description"></textarea>
                                                    @error('description_ar') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-6">
                                                <label for="required" class="col-lg-4 col-form-label fw-bold fs-6">Is Required:</label>
                                                <div class="col-lg-8 fv-row">
                                                    <div class="form-check form-switch">
                                                        <input id="required" type="checkbox" class="form-check-input"
                                                               wire:model.defer="required">
                                                    </div>
                                                    @error('required') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                                            <button type="submit" class="btn btn-primary">Update Question</button>
                                            <a href="{{ route('users') }}" class="btn btn-secondary ml-3">Back</a>
                                        </div>
                                    </form>
                                </div>
            </div>
        </div>
    </div>
</div>
