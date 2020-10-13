<x-master>
  <div class="w-1/3 mx-auto p-4 rounded shadow">
    <h2 class="mb-6 text-2xl font-semibold">
      Edit Post
    </h2>

    <form method="POST"
      action="{{$post->path('update')}}">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label
          class="block text-gray-700 text-sm font-semibold mb-2">
          Caption
        </label>
        <input type="text" name="caption"
          class="w-full border px-2 py-1 rounded
        focus:border-blue-500 focus:shadow-outline outline-none
          @error('caption') border-red-500 @enderror"
          value="{{$post->caption }}" required>
        @error('caption')
        <p class="text-xs text-red-400 italic">
          {{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <button type="submit"
          class="px-8 py-2 text-sm rounded text-white font-semibold
          bg-teal-500 focus:outline-none hover:bg-teal-400"
          >Update Caption
        </button>
      </div>

    </form>
  </div>
</x-master>