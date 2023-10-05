@if(session()->has('notification.message'))
    <div class="alert alert-{{ session()->get('notification.type', 'success') }}">
        {{ session()->get('notification.message') }}
    </div>
@endif
