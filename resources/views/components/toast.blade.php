@if (session()->has('message'))
<div class="toast show z-[999] position-absolute bottom-10 right-3 shadow" role="alert" aria-live="assertive"
    aria-atomic="true">
    <div class="toast-header">
        <img src="{{ asset('backend/assets/img/logo-small.webp') }}" class="rounded me-2" alt="...">
        <strong class="me-auto">{{ config('app.name') }}</strong>
        <span class="btn-close cursor-pointer" data-bs-dismiss="toast"><i class="fa-light fa-xmark"></i></span>

    </div>
    <div class="toast-body">
        {{ session('message') }}
    </div>
</div>
@endif