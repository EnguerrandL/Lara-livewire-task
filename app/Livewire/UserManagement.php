<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;

    #[Url()]
    public $perPage = 5;

    #[Url(history:true, as  : 'q')]
    public $search = '';

    #[Url(history:true)]
    public $admin = '';

    #[Url(history:true)]
    public $sortBy = 'created_at';

    #[Url(history:true)]
    public $sortDirection = 'DESC';

   


    #[Title('Users management')]
    #[Layout('home')]


    // Fix the issue when searching on user page 
    public function updatedSearch(){

        // Method from WithPagination 
        $this->resetPage();
    }

    public function setSortBy($sortByField){

        if($this->sortBy == $sortByField ){
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDirection = 'DESC';

    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function render()
    {
        return view('livewire.user-management', [
            'users' => User::search($this->search)
                ->when($this->admin !== '', function ($query) {
                    $query->where('is_admin', $this->admin);
                })
                ->orderBy($this->sortBy, $this->sortDirection)

                ->paginate($this->perPage),
        ]);
    }
}
