@extends('layouts.admin')

@section('content')
<div class="w-full px-6 py-6 mx-auto">
    <div class="bg-white p-10 rounded-xl shadow-xl">
      <livewire:admin.kelas.list-kelas />
    </div>
</div>
@endsection