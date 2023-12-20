<div>
    <div class="top" style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin: 15px auto;">
        <img src="{{ asset('site/assets/img/user.png') }}" width="75" alt="">
        <h3>{{ $user->name }}</h3>
    </div>

    <div class="bottom">
        <div class="data overflow-hidden" style="text-overflow: ellipsis;" title="{{ $user->name }}">{{ $user->name }}</div>
        <div class="data overflow-hidden" style="text-overflow: ellipsis;" title="{{ $user->email }}">{{ $user->email }}</div>
        <div class="data">{{ $user->phoneNumber }}</div>
        @livewire('edit-profile-modal')
    </div>
</div>
