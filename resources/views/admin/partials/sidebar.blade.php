<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">
    <!-- Brand Logo Light -->
    <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
    <span class="logo-lg">
      <img src="{{ asset('admin-assets/images/picklo-homes-logo.webp')}}" alt="logo"
           style="padding: 20px 0 10px 0; width: 50%; height: auto;"/>
    </span>
        <span class="logo-sm">
      <img src="{{ asset('admin-assets/images/logo.png')}}" alt="small logo"/>
    </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
    <span class="logo-lg">
      <img src="{{ asset('admin-assets/images/picklo-homes-logo.webp')}}" alt="dark logo"/>
    </span>
        <span class="logo-sm">
      <img src="{{ asset('admin-assets/images/logo.png')}}" alt="small logo"/>
    </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div
            class="button-sm-hover"
            data-bs-toggle="tooltip"
            data-bs-placement="right"
            title="Show Full Sidebar"
    >
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>
    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="pages-profile.php">
                <img
                        src="assets/images/users/avatar-1.jpg"
                        alt="user-image"
                        height="42"
                        class="rounded-circle shadow-sm"
                />
                <span class="leftbar-user-name mt-2">Tosha Minner</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-title">Navigation</li>

            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <i class="ri-home-4-line"></i>
                    <!-- <span class="badge bg-success float-end">2</span> -->
                    <span> Dashboard </span>
                </a>

            </li>

            <li class="side-nav-title">Apps</li>
<<<<<<< HEAD
{{--            <li class="side-nav-item">--}}
{{--                <a--}}
{{--                        data-bs-toggle="collapse"--}}
{{--                        href="#sidebarEmail"--}}
{{--                        aria-expanded="false"--}}
{{--                        aria-controls="sidebarEmail"--}}
{{--                        class="side-nav-link"--}}
{{--                >--}}
{{--                    <i class="ri-mail-line"></i>--}}
{{--                    <span> Leads </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarEmail">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}

{{--                            <a href="{{route('admin.manage.lead') }}">List</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{route('admin.create.lead')}}">Add New</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}


            <li class="side-nav-item">
                <a href="{{ route('admin.manage.lead') }}" class="side-nav-link">
                    <i class="ri-mail-line"></i>
                    <span> Leads </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('admin.user.followup') }}" class="side-nav-link">
                    <i class="ri-list-check-3"></i>
                    <span> Follow Ups </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('admin.manage.client') }}" class="side-nav-link">
                    <i class="ri-mail-line"></i>
                    <span> Clients </span>
                </a>
            </li>

=======
            <li class="side-nav-item">
                <a
                        data-bs-toggle="collapse"
                        href="#sidebarEmail"
                        aria-expanded="false"
                        aria-controls="sidebarEmail"
                        class="side-nav-link"
                >
                    <i class="ri-mail-line"></i>
                    <span> Leads </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>

                            <a href="{{route('admin.manage.lead') }}">Lead</a>
                        </li>
                        <li>
                            <a href="{{route('admin.user.followup')}}">Follow Ups</a>
                        </li>
                    </ul>
                </div>
            </li>






{{--            <li class="side-nav-item">--}}
{{--                <a href="{{ route('admin.manage.lead') }}" class="side-nav-link">--}}
{{--                    <i class="ri-mail-line"></i>--}}
{{--                    <span> Leads </span>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a href="{{ route('admin.user.followup') }}" class="side-nav-link">--}}
{{--                    <i class="ri-list-check-3"></i>--}}
{{--                    <span> Follow Ups </span>--}}
{{--                </a>--}}
{{--            </li>--}}



            <li class="side-nav-item">
                <a
                    data-bs-toggle="collapse"
                    href="#sidebarclient"
                    aria-expanded="{{ isset($client) ? 'true' : 'false' }}"
                    aria-controls="sidebarclient"
                    class="side-nav-link"
                >
                    <i class="ri-mail-line"></i>
                    <span> Clients </span>
                    <span class="menu-arrow"></span>
                </a>

                <div class="collapse {{ isset($client) ? 'show' : '' }}" id="sidebarclient">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.manage.client') }}">Client</a>
                        </li>

                        @isset($client)
                            <li>
                                <a href="{{ route('admin.manage.project.management', $client->faker_id) }}">
                                    <i class="ri-settings-3-line"></i>
                                    <span>Project Management</span>
                                </a>
                            </li>
                        @endisset
                    </ul>
                </div>
            </li>


            {{--            <li class="side-nav-item">--}}
{{--                <a href="{{ route('admin.manage.client') }}" class="side-nav-link">--}}
{{--                    <i class="ri-mail-line"></i>--}}
{{--                    <span> Clients </span>--}}
{{--                </a>--}}
{{--            </li>--}}

>>>>>>> 721f0e5 (First commit)
            <li class="side-nav-item">
                <a href="{{ route('admin.manage.file') }}" class="side-nav-link">
                    <i class="ri-folder-2-line"></i>
                    <span> File Manager </span>
                </a>
            </li>

<<<<<<< HEAD
            <li class="side-nav-item">
                <a
                        data-bs-toggle="collapse"
                        href="#sidebarCategorys"
                        aria-expanded="false"
                        aria-controls="#sidebarCategorys"
                        class="side-nav-link"
                >
                    <i class="ri-task-line"></i>
                    <span> Phases & Tasks </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCategorys">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('admin.manage.pre.category') }}">Phases</a>
                        </li>
                        <li>
                            <a href="{{route('admin.manage.pre.task') }}">Tasks</a>
                        </li>
                    </ul>
                </div>
            </li>
=======
{{--            <li class="side-nav-item">--}}
{{--                <a--}}
{{--                        data-bs-toggle="collapse"--}}
{{--                        href="#sidebarCategorys"--}}
{{--                        aria-expanded="false"--}}
{{--                        aria-controls="#sidebarCategorys"--}}
{{--                        class="side-nav-link"--}}
{{--                >--}}
{{--                    <i class="ri-task-line"></i>--}}
{{--                    <span> Phases & Tasks </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarCategorys">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="{{route('admin.manage.pre.category') }}">Phases</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{route('admin.manage.pre.task') }}">Tasks</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}
>>>>>>> 721f0e5 (First commit)




{{--            <li class="side-nav-item">--}}
{{--                <a href="{{ route('admin.manage.task') }}" class="side-nav-link">--}}
{{--                    <i class="ri-list-check-3"></i>--}}
{{--                    <span> Task </span>--}}
{{--                </a>--}}
{{--            </li>--}}



            @canany(['user-list', 'role-list'])
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#user-menu" aria-expanded="false" aria-controls="sidebarPages"
                       class="side-nav-link">
                        <i class="ri-pages-line"></i>
                        <span> Settings </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="user-menu">
                        <ul class="side-nav-second-level">
                            @can('user-list')
                                <li>
                                    <a href="{{ route('admin.manage.users') }}">Users</a>
                                </li>
                            @endcan

                                <li>
                                    <a href="{{ route('admin.manage.roles') }}">Roles</a>
                                </li>

{{--                            @can('user-create')--}}
{{--                                <li>--}}
{{--                                    <a href="{{ route('admin.create.user') }}">Add New</a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}
<<<<<<< HEAD
=======

                                <li>
                                    <a href="{{route('admin.manage.pre.category') }}">Phases</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.manage.pre.task') }}">Tasks</a>
                                </li>
>>>>>>> 721f0e5 (First commit)
                        </ul>
                    </div>
                </li>
            @endcanany


{{--            <li class="side-nav-item">--}}
{{--                <a--}}
{{--                        data-bs-toggle="collapse"--}}
{{--                        href="#user-role"--}}
{{--                        aria-expanded="false"--}}
{{--                        aria-controls="sidebarPages"--}}
{{--                        class="side-nav-link"--}}
{{--                >--}}
{{--                    <i class="ri-pages-line"></i>--}}
{{--                    <span> Roles </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="user-role">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('admin.manage.roles') }}">List</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('admin.create.role') }}">Add New</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}
        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
