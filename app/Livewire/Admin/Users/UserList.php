<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use App\Models\User;


#[Title("Management user list")]
class UserList extends Component
{
    use WithPagination;
    public $title = 'User List...';
    public $perPage = 7;

    public $sortBy = 'created_at';

    public $sortDir = 'DESC';

    public $search = '';

    public function setSort($colName) {
        if ($this->sortBy = $colName) {
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy = $colName;
        $this->sortDir = 'ASC';
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.users.user-list',[
    'users' => User::search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage)]);
    }
}
