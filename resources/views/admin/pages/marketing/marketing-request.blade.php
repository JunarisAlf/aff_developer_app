@extends('admin.layout.APP_PANEL')
@section('page_title', 'Marketing | Permintaan Gabung')
@section('menu_title', 'Marketing | Permintaan Gabung')

@section('HTML_Main')
   @livewire('marketing.marketing-request-table')
   @livewire('marketing.marketing-reject-modal')
@endsection