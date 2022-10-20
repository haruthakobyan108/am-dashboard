{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="las la-user-tie"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user-friendship') }}"><i class="lab la-mailchimp"></i> User friendships</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('organisations') }}"><i class="lab la-stack-overflow"></i> Organisations</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('organization-buisness-model') }}"><i class="las la-meteor"></i> Organization BM</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user-organizations-map') }}"><i class="las la-hippo"></i> User organizations</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('fs-roles') }}"><i class="las la-umbrella"></i> Fs roles</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('reports') }}"><i class="nav-icon la la-radiation-alt"></i> Reports</a></li>
