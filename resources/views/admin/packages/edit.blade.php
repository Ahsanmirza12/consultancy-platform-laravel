@extends('layouts.app')
@include('partials.header')
@include('partials.sidebar')
@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4">Edit Package</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('packages.update-package', $package->id) }}" method="POST" class="bg-light p-4 rounded shadow">

      @csrf
      @method('PUT')
  
      <!-- Hidden package ID if needed -->
      <input type="hidden" name="package_id" value="{{ $package->id }}">
  
      <div class="mb-3">
          <label for="name" class="form-label">Package Name</label>
          <input type="text" name="name" class="form-control" value="{{ old('name', $package->name) }}" required>
          @error('name') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
  
      <div class="mb-3">
          <label for="price" class="form-label">Price (Rs)</label>
          <input type="number" name="price" class="form-control" value="{{ old('price', $package->price) }}" required>
          @error('price') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
  
      <div class="mb-3">
          <label for="duration_days" class="form-label">Duration (days)</label>
          <input type="number" name="duration_days" class="form-control" value="{{ old('duration_days', $package->duration_days) }}" required>
          @error('duration_days') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
  
      <!-- Optional Payment Method Example -->
     
  
      <button type="submit" class="btn btn-primary w-100">Update Package</button>
  </form>
  
  
</div>
@endsection
@include('partials.footer')
@include('partials.script')

