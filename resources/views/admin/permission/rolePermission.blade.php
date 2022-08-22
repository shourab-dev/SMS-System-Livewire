<x-app-layout>
    <x-slot name="header">
        Role and Permission
    </x-slot>
    @foreach ($roles as $key=>$role)
    <h3 class="h4 border p-2">{{ str()->title($key) }} Role</h3>
    <table class="table table-responsive">
        <tr>
            <td>
                #
            </td>
            <td>Role Name</td>
            <td>Actions</td>
        </tr>
        @foreach ($role as $key=>$role )
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ str()->title($role->name) }}</td>
            <td>
                <div class="btn-group btn-group-sm">
                    <a type="button" href="{{ route('admin.role.permission.edit', $role->id) }}"
                        class="btn btn-warning">Edit Role</a>
                    {{-- <a type="button" class="btn btn-danger">Delete Role</a> --}}

                </div>
            </td>
        </tr>
        @endforeach

    </table>

    <br>
    <br>
    <br>
    @endforeach

</x-app-layout>