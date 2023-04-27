@extends('layouts.admin')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<link rel="stylesheet" href="//unpkg.com/@highlightjs/cdn-assets@11.7.0/styles/tokyo-night-dark.min.css">
@endpush

@section('content')
<div class="w-full px-6 py-6 mx-auto">
  {{-- <div class="mb-10">
    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-full group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
      <span class="relative p-2 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-full group-hover:bg-opacity-0">
        <svg class="w-8" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" id="arrow-left"><path fill="#0092E4" d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"></path></svg>
      </span>
    </button>    
  </div> --}}
  <div>
    <ul>
      
    </ul>
  </div>
  <livewire:admin.create-section :slug="$slug" :idSection="$idSection"/>
</div>
@endsection

@push('scripts')
<script src="//unpkg.com/@highlightjs/cdn-assets@11.7.0/highlight.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    hljs.highlightAll();
  });
</script>
@endpush