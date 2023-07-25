@extends('admin.layout.APP_PANEL')
@section('page_title', 'Daftar Properti')
@section('menu_title', 'Daftar Properti')

@section('HTML_Main')
   @livewire('property.property-list.property-list-table')
   @livewire('property.property-list.property-detail')

@endsection

@section('page_css')
    <script src="https://cdn.tiny.cloud/1/juy43fk1zr4yv9w6p0r12txr6hjp349hdnr9w7t6myl71vdg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: '#property-description'
        });
      </script>
@endsection
@section('page_script')
   
@endsection