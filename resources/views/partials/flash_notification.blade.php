@if(session()->has('flash_notification.message'))
    <div class="alert alert-{{ session('flash_notification.status') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">🎊</button>
        {{ session('flash_notification.message') }}
    </div>
@endif