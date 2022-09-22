<?php

namespace App\Http\Livewire\Branch;

use App\Models\Branch as ModelBranch;
use Livewire\Component;

class Branch extends Component
{
    public $branchTitle, $status = true;
    public $isEdit;


    protected $rules = [
        'branchTitle' => 'required',
    ];

    private function storeAndUpdate($branch)
    {
        $branch->name = $this->branchTitle;
        $branch->slug = str($this->branchTitle)->slug();
        $branch->status = $this->status;
        $branch->save();
        return $branch;
    }

    public function addBranch()
    {
        $this->validate();

        $branch = new ModelBranch();
        $this->storeAndUpdate($branch);
        $this->reset();
        session()->flash('message', 'Branch Added Successfully');
    }
    public function render()
    {
        return view('livewire.branch.branch', ['branches' => ModelBranch::select('id', 'name', 'status')->orderBy('name', 'ASC')->paginate(10)]);
    }
    public function changeStatus(ModelBranch $branch)
    {
        $branch->status == true ? $branch->status = false : $branch->status = true;
        $branch->save();
        session()->flash('message', "$branch->name Branch Status Updated");
    }
    public function branchUpdate(ModelBranch $branch)
    {
        $this->branchTitle = $branch->name;
        $this->status = $branch->status;
        $this->isEdit = $branch->id;
    }
    public function branchNameUpdate(ModelBranch $branch)
    {

        $this->storeAndUpdate($branch);
        session()->flash('message', "$branch->name is Updated");
        $this->reset();
    }
}
