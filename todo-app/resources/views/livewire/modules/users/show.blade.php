<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    @if(auth()->user()->isAdmin())
                    <div class="me-2" data-kt-customer-table-toolbar="base">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
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
                            <th class="min-w-100px">Name</th>
                            <th class="min-w-100px">Email</th>
                            <th class="min-w-50px">Role</th>
                            <th class="min-w-50px">Created At</th>
                            <th class="text-center min-w-70px">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                        @foreach($users as $user)
                            @php/** @var \App\Models\User $user */ @endphp
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a href="{{ route('users.edit', $user->id) }}" class="dropdown-item">Edit</a>
                                                <a href="javascript:void(0);" class="dropdown-item" wire:click="delete({{ $user->id }})">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
