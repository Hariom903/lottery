  <li class="dropdown pc-h-item">
      <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button"
          aria-haspopup="false" aria-expanded="false">
          <i data-feather="bell"></i>
          <span class="badge bg-success pc-h-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
      </a>
      <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
          <div class="dropdown-header d-flex align-items-center justify-content-between">
              <h5 class="m-0">Notifications</h5>
             <form action="{{ route('notifications.markAllRead') }}" method="POST" class="d-inline">
               @csrf
          <button type="submit" class="btn btn-link btn-sm p-0">Mark all read</button>
             </form>

          </div>
          <div class="dropdown-body text-wrap header-notification-scroll position-relative"
              style="max-height: calc(100vh - 215px)">


              <p class="text-span">Today</p>

              @foreach (auth()->user()->unreadNotifications as $notification)
                  <div class="card mb-0">
                      <div class="card-body">
                          <div class="d-flex">
                              <div class="flex-shrink-0">
                                  <img class="img-radius avtar rounded-0" src="{{ asset('images/user/avatar-2.jpg') }}"
                                      alt="User avatar" />
                              </div>
                              <div class="flex-grow-1 ms-3">
                                  <span class="float-end text-sm text-muted">
                                      {{ $notification->created_at->diffForHumans() }}
                                  </span>
                                  <h5 class="text-body mb-2">
                                      {{ $notification->data['title'] ?? 'Notification' }}
                                  </h5>
                                  <p class="mb-0">
                                      {{ $notification->data['message'] ?? 'You have a new notification.' }}
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>
              @endforeach

          </div>
<div class="text-center py-2">
    <form action="{{ route('notifications.clear') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-link link-danger p-0">Clear all Notifications</button>
    </form>
</div>
      </div>
  </li>
