@extends('includes.layout')
@section('content')
<div class="flex justify-center items-center h-screen bg-gray-100">
  <div class="max-w-md w-full mx-auto">
    <div class="bg-white rounded-lg shadow-lg p-6">
      <h2 class="text-2xl font-bold mb-6">Create a new event!</h2>
      <form action="{{ route('updateEvent',['id'=>$event->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
          <input name="title" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Title" value="{{ $event->title }}">
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
          <textarea name="description" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" placeholder="Description">{{ $event->description }}</textarea>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="date">Date</label>
          <input name="date" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date" type="date" placeholder="Date" value="{{ $event->date }}">
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="place">Place</label>
          <input name="place" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="place" type="text" placeholder="Place" value="{{ $event->place }}">
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity">Quantity</label>
          <input name="quantity" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="quantity" type="number" placeholder="Quantity" value="{{ $event->quantity }}">
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="category">Category</label>
          <select name="category_id" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category">
            <option value="">Select a category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $event->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-4 flex items-center">
          <input name="acceptance" id="acceptance" type="checkbox" class="mr-2" {{ $event->autoTicket ? 'checked' : '' }}>
          <label class="text-gray-700 text-sm font-bold" for="acceptance">Automatic Acceptance</label>
        </div>

        <!-- Form fields for editing the event details -->
        <!-- ... -->
        <button type="submit" style="background-color: #337ab7; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; font-size: 16px;">Edit Event</button>
      </form>
    </div>
  </div>
</div>

<script>
  function previewImage(event) {
    const input = event.target;
    const reader = new FileReader();

    reader.onload = function() {
      const preview = document.getElementById('preview');
      preview.src = reader.result;
    }

    reader.readAsDataURL(input.files[0]);
  }
</script>
@endsection

@if($errors->any())
<div class="bg-red-500 text-white p-4">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif