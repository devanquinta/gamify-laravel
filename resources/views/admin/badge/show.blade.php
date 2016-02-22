@extends('layouts.admin')

{{-- Web site Title --}}
@section('title')
    {{ trans('admin/badge/title.badge_show') }} :: @parent
@endsection

{{-- Content Header --}}
@section('header')
        {{ trans('admin/badge/title.badge_show') }}
        <small>{{ $badge->name }}</small>
@endsection

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    <li>
        <a href="{{ route('admin.badges.index') }}">
            <i class="fa fa-gift"></i> {{ trans('admin/site.badges') }}
        </a>
    </li>
    <li class="active">
        {{ trans('admin/badge/title.badge_show') }}
    </li>
    @endsection

    {{-- Content --}}
    @section('content')

            <!-- Notifications -->
    @include('partials.notifications')
            <!-- ./ notifications -->

    @include('admin/badge/_details', ['action' => 'show'])

@endsection