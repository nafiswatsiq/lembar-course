@extends('layouts.app')

@section('content')
<div class="bg-blue-300 py-10">
    <p>selamat datang</p>
    <div x-data="{ open: false }" class="pt-30">
        <button @click="open = ! open">Toggle Content</button>
     
        <div x-show="open">
            Content...
        </div>
    </div>
    <p>haiiii</p>
</div>
@endsection