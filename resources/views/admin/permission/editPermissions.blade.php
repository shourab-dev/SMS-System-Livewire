<x-app-layout>
    <x-slot name="header">
        {{ str()->title($role->name) }} Role

    </x-slot>
    <form action="{{ route('admin.role.permission.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="roleName" class="w-100">
            Role Name
            <input type="text" class="form-control" id="roleName" name="roleName" value="{{ $role->name }}">
            <input type="hidden" name="roleId" value="{{ $role->id }}">
        </label>
        <h3 class="my-3">All Permissions</h3>
        <div class="allPermissions">
            <table class="table table-responsive text-center">
                <tr>
                    <td>#</td>
                    <td style="width: 40%;">Permission</td>
                    <td>Detail</td>
                </tr>
                @forelse ($permissions as $key=>$permission)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>
                        <input type="checkbox" {{ $permission->id }} {{ $hasPermissions->search($permission->id) > -1 ?
                        'checked' : ''}}
                        name="permission[]" value="{{ $permission->id }}" id="banUser{{ $key
                        }}">
                        <label style="cursor: pointer" for="banUser{{ $key }}">{{ $permission->name }}</label>
                    </td>
                    <td>{{ $permission->detail }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">No Permission Has Been Given</td>
                </tr>
                @endforelse


            </table>
        </div>
        <button type="submit" class="btn btn-primary float-end mt-3">Update</button>
    </form>




</x-app-layout>