@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="//unpkg.com/@highlightjs/cdn-assets@11.7.0/styles/tokyo-night-dark.min.css">
@endpush

@section('content')
<div class="bg-white py-10">
    <p>selamat datang</p>
    <div x-data="{ open: false }" class="pt-30">
        <button @click="open = ! open">Toggle Content</button>
     
        <div x-show="open">
            Content...
        </div>
    </div>
    <p>haiiii</p>

    <div>
        {!! $section->content !!}
    </div>
        
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