<x-login>
    <x-slot name="loginPanel">
        Student
    </x-slot>

    <form method="POST" action="{{ route('student.login') }}">
        @csrf
        <div class="form-group">
            <input class="form-control" name="phone" type="text" placeholder="Phone">
        </div>
        <div class="form-group">
            <input class="form-control" name="password" type="text" placeholder="Password">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Login</button>
        </div>
    </form>
</x-login>