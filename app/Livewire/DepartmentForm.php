<?php

namespace App\Livewire;

use App\Models\Department;
use Livewire\Component;

class DepartmentForm extends Component
{

    public $name = 'Accounting';
    public $success = false;

    public function submit()
    {
        Department::create([
            'name' => $this->name,
            'tenant_id' => session()->get('tenant_id')
        ]);

        $this->success = true;
    }

    public function mount($departmentId = null)
    {
        if($departmentId) {
            $this->name = Department::findOrFail($departmentId)->name;
        }
    }

    public function render()
    {
        return view('livewire.department-form');
    }
}
