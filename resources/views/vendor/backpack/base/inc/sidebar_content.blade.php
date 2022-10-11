{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-question"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user-friendship') }}"><i class="nav-icon la la-question"></i> User friendships</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('organisations') }}"><i class="nav-icon la la-question"></i> Organisations</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user-organizations-map') }}"><i class="nav-icon la la-question"></i> User organizations</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('fs-roles') }}"><i class="nav-icon la la-question"></i> Fs roles</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('reports') }}"><i class="nav-icon la la-question"></i> Reports</a></li>