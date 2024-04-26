<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    #[Url(as: 'find')]
    public $search = '';

    #[Validate(['required', 'max:255'])]
    public $name = '';

    #[Validate(['required', 'email', 'max:255', 'unique:users,email'])]
    public $email = '';

    #[Validate(['required', 'max:20', 'min:8'])]
    public $password = '';

    #[Validate(['required', 'max:1024'])]
    public $profile_images = [];

    public $userEdit;

    public function addUser()
    {
        $this->validate();

        $profile_images = [];
        foreach ($this->profile_images as $p) {
            $file_name = $this->name . uniqid() . '.' . $p->extension();
            $profile_images[] = $p->storeAs('public/users/photos', $file_name);
        }

        User::create([
            'profile_image'     =>      $profile_images,
            'name'              =>      $this->name,
            'email'             =>      $this->email,
            'password'          =>      bcrypt($this->password)
        ]);

        $this->reset();
        session()->flash('message', 'User Added Successfully');
        $this->dispatch('success');
    }

    public function delete($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();

            session()->flash('message', 'User deleted successfully');
        } else {
            session()->flash('error', 'User is already deleted');
        }

        $this->dispatch('success');
    }

    public function editUser($id)
    {
        $this->userEdit = User::findOrFail($id);

        $this->name = $this->userEdit->name;
        $this->email = $this->userEdit->email;
        $this->profile_images = $this->userEdit->profile_image;
    }

    public function resetData()
    {
        $this->reset();
    }

    public function render()
    {
        // $usersSearched = [];

        // if(strlen($this->search >= 1))
        // {
        //     $usersSearched = User::where('name', 'like', '%' . $this->search . '%')->limit(5)->get();
        // }
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.users.index', compact(/*'usersSearched', */'users'));
    }
}
