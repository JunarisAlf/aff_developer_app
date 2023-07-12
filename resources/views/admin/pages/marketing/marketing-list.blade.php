@extends('admin.layout.APP_PANEL')
@section('page_title', 'Daftar Marketing')
@section('menu_title', 'Daftar Marketing')

@section('HTML_Main')
   @livewire('marketing.marketing-list-table')
   {{-- @livewire('marketing.marketing-reject-modal') --}}
@endsection