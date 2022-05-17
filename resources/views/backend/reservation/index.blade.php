@extends('backend.layouts.app')

@section('title', __('Reservations'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Reservations')
        </x-slot>

        <x-slot name="body">
            @include('backend.reservation.calendar')
        </x-slot>
    </x-backend.card>
@endsection
