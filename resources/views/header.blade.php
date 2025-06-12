  <header class="pc-header  mb-4 ">
      <div class="m-header">
          <a href="{{ route('home') }}" class="b-brand text-primary">
              <!-- ========   Change your logo from here   ============ -->
              <img src="{{ asset('images/logo-white.svg') }}" alt="logo image" class="logo-lg" />
          </a>
      </div>


      <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
          <div class="me-auto pc-mob-drp">
              <ul class="list-unstyled">
                  <!-- ======= Menu collapse Icon ===== -->
                  {{-- <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                            <i class="ph ph-list"></i>
                        </a>
                    </li> --}}
                  <li class="pc-h-item pc-sidebar-popup">
                      <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                          <i class="ph ph-list"></i>
                      </a>
                  </li>
              </ul>
          </div>
          {{-- home about login sinup  --}}

          <div class="ms-auto mx-3 pc-mob-drp d-flex align-items-center gap-3">
              <ul class="list-unstyled d-flex align-items-center mb-0 gap-3 mx-0">


                  <li class="pc-h-item">
                      <a href="{{ route('home') }}" class="pc-head-link">Home</a>
                  </li>
                  <li class="pc-h-item">
                      <a href="#" class="pc-head-link">About</a>
                  </li>
                  <li class="pc-h-item">
                      <a href="#contact-us" class="pc-head-link">Contect us</a>
                  </li>
                  @if (!Auth::check())
                      <li class="pc-h-item">
                          <i class="ph ph-star me-1"> </i>
                          <a href="{{ route('signup.form') }}" class="pc-head-link"> Become a Member </a>
                      </li>
                  @else
                      <li class='pc-h-item'>
                          <a href="{{ route('mytickets') }}" class="pc-head-link">mytickets</a>
                      </li>
                      <li class='pc-h-item'>
                         @include('notifications')
                      </li>

                      <div class="ms-auto">
                          <ul class="list-unstyled">
                              <li class="dropdown pc-h-item header-user-profile">
                                  <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                                      href="#" role="button" aria-haspopup="false"
                                      data-bs-auto-close="outside" aria-expanded="false">
                                      <img src="{{ asset('images/user/avatar-2.jpg') }}" alt="user-image"
                                          class="user-avtar" />
                                  </a>
                                  <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                                      <div class="dropdown-body">
                                          <div class="profile-notification-scroll position-relative"
                                              style="max-height: calc(100vh - 225px)">
                                              <ul class="list-group list-group-flush w-100">

                                                  <li class="list-group-item">
                                                      <a href="#" class="dropdown-item">
                                                          <span class="d-flex align-items-center">
                                                              <i class="ph ph-user-circle"></i>
                                                              <span>Edit profile <span
                                                                      class="me-1">{{ Auth::user()->name }}</span>
                                                              </span>
                                                          </span>
                                                        </a>
                                                      <a href="#" class="dropdown-item">
                                                          <span class="d-flex align-items-center">
                                                              <i class="ph ph-gear-six"></i>
                                                              <span>Settings</span>
                                                          </span>
                                                      </a>
                                                      <a href="{{ route('logout') }}" class="dropdown-item">
                                                          <span class="d-flex align-items-center">
                                                              <i class="ph ph-sign-out"></i>
                                                              <span>Logout </span>
                                                          </span>
                                                      </a>



                                                  </li>

                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  @endif
              </ul>
          </div>

      </div>

      </ul>

      <!-- [Mobile Media Block end] -->

      </div>
  </header>
