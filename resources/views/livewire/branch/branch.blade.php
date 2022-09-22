<div class="container">

    <x-toast />

    <div class="row">

        <div class="col-lg-8">

            <table class="table table-responsive">
                <tr>
                    <th>#</th>
                    <th>Branch Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @forelse ($branches as $key=>$branch)
                <tr>
                    <td>{{ $branches->firstItem() + $key }}</td>
                    <td>
                        {{ $branch->name }}

                    </td>
                    <td>
                        <label for="status{{ $key }}" class="inline-flex relative items-center cursor-pointer">
                            <input type="checkbox" {{ $branch->status == true ? 'checked'
                            : '' }} wire:click="changeStatus({{ $branch->id }})" id="status{{ $key }}" class="sr-only
                            peer">

                            <div
                                class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 rounded-full peer dark:bg-gray-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-900 ">{{ $branch->status == true ? 'Active'
                                : 'Deactive' }}</span>
                        </label>
                    </td>
                    <td>
                        <a class="btn btn-block btn-outline-info" wire:click="branchUpdate({{ $branch->id }})">Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No Branch Found</td>
                </tr>
                @endforelse
            </table>
            <div class="mt-5">{{ $branches->links() }}</div>
        </div>
        <div class="card col-lg-4 px-0">
            <div class="bg-blue-500 p-3 rounded text-white">
                <h4>{{ $isEdit ? 'Edit' : 'Add' }} Branches</h4>
            </div>
            <div class="card-body">
                <input type="text" wire:model.lazy="branchTitle"
                    class="form-control @error('branchTitle')is-invalid @enderror" placeholder="Branch Name">
                <br>
                <label for="status" class="inline-flex relative items-center cursor-pointer">
                    <input type="checkbox" checked wire:model.lazy="status" id="status" class="sr-only peer">

                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 rounded-full peer dark:bg-gray-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-900 ">Branch Status</span>
                </label>
                @error('branchTitle')
                <br>
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
                @if ($isEdit)
                <button wire:click="branchNameUpdate({{ $isEdit }})"
                    class="bg-blue-600 text-white d-block w-100 mt-2 py-2 rounded-2">Edit
                    Branch</button>
                @else
                <button wire:click="addBranch" class="bg-blue-600 text-white d-block w-100 mt-2 py-2 rounded-2">Add
                    Branch</button>
                @endif
            </div>
        </div>
    </div>
</div>