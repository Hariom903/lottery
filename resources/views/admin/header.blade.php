  <header class="pc-header">
      <div class="m-header">
          <a href="../dashboard/index.html" class="b-brand text-primary">
              <!-- ========   Change your logo from here   ============ -->
              <img src="{{ asset('images/logo-white.svg') }}" alt="logo image" class="logo-lg" />
          </a>
      </div>
      <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
          <div class="me-auto pc-mob-drp">
              <ul class="list-unstyled">
                  <!-- ======= Menu collapse Icon ===== -->
                  <li class="pc-h-item pc-sidebar-collapse">
                      <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                          <i class="ph ph-list"></i>
                      </a>
                  </li>
                  <li class="pc-h-item pc-sidebar-popup">
                      <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                          <i class="ph ph-list"></i>
                      </a>
                  </li>
                  <li class="dropdown pc-h-item">
                      <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#"
                          role="button" aria-haspopup="false" aria-expanded="false">
                          <i class="ph ph-magnifying-glass"></i>
                      </a>
                      <div class="dropdown-menu pc-h-dropdown drp-search">
                          <form class="px-3">
                              <div class="form-group mb-0 d-flex align-items-center">
                                  <input type="search" class="form-control border-0 shadow-none"
                                      placeholder="Search here. . ." />
                                  <button class="btn btn-light-secondary btn-search">Search</button>
                              </div>
                          </form>
                      </div>
                  </li>
              </ul>
          </div>
          <!-- [Mobile Media Block end] -->
          <div class="ms-auto">
              <ul class="list-unstyled">
                  <li class="dropdown pc-h-item header-user-profile">
                      <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                          role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                         <img src="{{ Auth::user()->image ? asset('images/user/' . Auth::user()->image) : asset('images/user/avatar-1.jpg') }}"
                                          alt="user-image" class="user-avtar" />
                      </a>
                      <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                          <div class="dropdown-body">
                              <div class="profile-notification-scroll position-relative"
                                  style="max-height: calc(100vh - 225px)">
                                  <ul class="list-group list-group-flush w-100">

                                      <li class="list-group-item">
                                          <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                              data-bs-target="#updateprofile">
                                              <span class="d-flex align-items-center">
                                                  <i class="ph ph-user-circle"></i>
                                                  <span>Edit profile <span
                                                          class="me-1">{{ Auth::user()->name }}</span>
                                                  </span>
                                              </span>
                                          </button>
                                          <a href="#" class="dropdown-item">
                                              <span class="d-flex align-items-center">
                                                  <i class="ph ph-bell"></i>
                                                  <span>Notifications</span>
                                              </span>
                                          </a>


                                          <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                              data-bs-target="#changepassword">
                                              <span class="d-flex align-items-center">
                                                  <i class="ph ph-gear-six"></i>
                                                  <span>Change password</span>
                                              </span>
                                          </button>
                                      </li>
                                      <li class="list-group-item">
                                          <a href="#" class="dropdown-item">
                                              <span class="d-flex align-items-center">
                                                  <i class="ph ph-plus-circle"></i>
                                                  <span>Add account</span>
                                              </span>
                                          </a>
                                          <form action="{{ route('admin.logout') }}" method="post">
                                              @csrf
                                              <button type="submit" class="dropdown-item">
                                                  <span class="d-flex align-items-center">
                                                      <i class="ph ph-power"></i>
                                                      <span>Logout</span>
                                                  </span>
                                              </button>
                                          </form>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </li>
              </ul>
          </div>
      </div>
  </header>


  <!-- filepath: c:\Users\user\Desktop\lottery\lottery_apk\resources\views\changepassword.blade.php -->
  <div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="changepasswordModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="changepasswordModalLabel">Change Password</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form id="changePasswordForm">
                      @csrf
                      <div class="mb-3">
                          <label for="current_password" class="form-label">Current Password</label>
                          <input type="password" class="form-control" id="current_password" name="current_password">
                          <span class="red-error" id="error_current_password"></span>
                      </div>
                      <div class="mb-3">
                          <label for="new_password" class="form-label">New Password</label>
                          <input type="password" class="form-control" id="new_password" name="new_password">
                          <span class="red-error" id="error_new_password"></span>
                      </div>
                      <div class="mb-3">
                          <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                          <input type="password" class="form-control" id="new_password_confirmation"
                              name="new_password_confirmation">
                          <span class="red-error" id="error_new_password_confirmation"></span>
                      </div>
                      <div class="mb-3">
                          <button type="button" onclick="chapassword()" class="btn btn-primary">Change
                              Password</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <script>
      function chapassword() {
          // Clear previous errors
          $('#error_current_password').text('');
          $('#error_new_password').text('');
          $('#error_new_password_confirmation').text('');

          var currentPassword = $('#current_password').val();
          var newPassword = $('#new_password').val();
          var confirmPassword = $('#new_password_confirmation').val();

          if (newPassword !== confirmPassword) {
              $('#error_new_password_confirmation').text('New password and confirm password do not match.');
              return;
          }

          $.ajax({
              url: '{{ route('admin.change.password') }}',
              type: 'POST',
              data: {
                  _token: '{{ csrf_token() }}',
                  current_password: currentPassword,
                  new_password: newPassword,
                  new_password_confirmation: confirmPassword
              },
              success: function(response) {
                  if (response.status === 'success') {
                      alert(response.message);
                      $('#changepassword').modal('hide');
                      $('#changePasswordForm')[0].reset();
                      window.location.reload();
                  }
              },
              error: function(xhr) {
                  var res = xhr.responseJSON;
                  if (res && res.errors) {
                      if (res.errors.current_password) {
                          $('#error_current_password').text(res.errors.current_password[0]);
                      }
                      if (res.errors.new_password) {
                          $('#error_new_password').text(res.errors.new_password[0]);
                      }
                      if (res.errors.new_password_confirmation) {
                          $('#error_new_password_confirmation').text(res.errors.new_password_confirmation[0]);
                      }
                  } else {
                      alert('An unexpected error occurred.');
                  }
              }
          });
      }
  </script>

  <!-- filepath: c:\Users\user\Desktop\lottery\lottery_apk\resources\views\changepassword.blade.php -->
  <div class="modal fade" id="updateprofile" tabindex="-1" aria-labelledby="updateprofileModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="updateprofileModalLabel">Update Profile</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="text-center">
                      <a href="{{ Auth::user()->image ? asset('images/user/' . Auth::user()->image) : asset('images/user/avatar-1.jpg') }}"
                          class="glightbox " data-width="600px">
                          <img src="{{ Auth::user()->image ? asset('images/user/' . Auth::user()->image) : asset('images/user/avatar-1.jpg') }}"
                              width="150px" alt="">
                      </a>
                  </div>
                  <form id="updateprofileForm">
                      @csrf
                      <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}"
                              name="name">
                          <span class="red-error" id="error_name"></span>
                      </div>
                      <div class="mb-3">
                          <label for="phone" class="form-label">phone </label>
                          <input type="text" class="form-control" id="phone"
                              value="{{ Auth::user()->phone }}" name="phone">
                          <span class="red-error" id="error_phone"></span>
                      </div>
                      <div class="mb-3">
                          <label for="profile_pic" class="form-label">Profile picture </label>
                          <input type="file" class="form-control" id="profile_pic" name="profile_pic">
                          <span class="red-error" id="error_profile_pic"></span>
                      </div>
                      <div class="mb-3">
                          <button type="button" onclick="updateprofile()" class="btn btn-primary">Update Profile
                          </button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <script>
      function updateprofile() {
          // Clear previous errors
          $('#error_name').text('');
          $('#error_phone').text('');
          $('#profile_pic').text('');

          var name = $('#name').val();

          var phone = $('#phone').val();
          var profile_pic = $('#profile_pic')[0].files[0];

          var formdata = new FormData();

          formdata.append('name', name);
          formdata.append('phone', phone);
          formdata.append('image', profile_pic);
          formdata.append("_token", '{{ csrf_token() }}');

          $.ajax({
              url: '{{ route('admin.update.profile') }}',
              type: 'POST',
              processData: false,
              contentType: false,
              data: formdata,
              success: function(response) {
                  if (response.status === 'success') {
                      $('#updateprofile').modal('hide');
                      $('#updateprofileForm')[0].reset();
                      window.location.reload();
                  } else {
                      alert("hi ")
                  }
              },
              error: function(xhr) {
                  var res = xhr.responseJSON;
                  if (res && res.errors) {
                      if (res.errors.name) {
                          $('#error_name').text(res.errors.name[0]);
                      }
                      if (res.errors.phone) {
                          $('#error_phone').text(res.errors.phone[0]);
                      }
                      if (res.errors.image) {
                          $('#profile_pic').text(res.errors.image[0]);
                      }
                  } else {
                      alert('An unexpected error occurred.');
                  }
              }
          });
      }

      const lightbox = GLightbox({
          selector: '.glightbox',

      });
  </script>
