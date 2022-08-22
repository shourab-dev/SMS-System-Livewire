<x-login>
    <x-slot name="loginPanel">
        Admin
    </x-slot>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input class="form-control" name="email" type="text" placeholder="Email">
        </div>
        <div class="form-group">
            <input class="form-control" name="password" type="text" placeholder="Password">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Login</button>
        </div>
    </form>
</x-login>