<?php

namespace App\Livewire\Modules\Users;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Show extends Component
{
    public $emailFilter = '';

    public function render()
    {
        // Generate a cache key based on the current email filter and page
        $cacheKey = 'users_page_' . trim($this->emailFilter) . '_page_' . request('page', 1);

        // Check if the data is already in cache
        $users = Cache::remember($cacheKey, now()->addMinutes(10), function () {
            // Query the users and apply the email filter if needed
            return User::when($this->emailFilter, function ($query) {
                return $query->where('email', 'like', '%' . trim($this->emailFilter) . '%');
            })->paginate(10);
        });

        return view('livewire.modules.users.show', [
            'users' => $users,
        ]);
    }





    public function delete($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->delete();
            session()->flash('message', 'User deleted successfully!');
        } else {
            session()->flash('message', 'User not found.');
        }
        return redirect()->route('users');
    }
}
