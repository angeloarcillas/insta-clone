<x-master>
  <div class="w-1/3 mx-auto p-4 rounded shadow">
    <h2 class="mb-6 text-2xl font-semibold">Create
      Post</h2>
    <form action="/posts" method="POST"
      enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
        <label class="px-4 py-2 text-sm rounded
          text-gray-800 border focus:outline-none
          hover:bg-gray-100 inline-flex items-center
          justify-between">
          <input class="hidden" type="file"
            name="image" autofocus required>Upload
          file
          <svg class="w-4 h-4 fill-current ml-4"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20">
            <path
              d="M13 10v6H7v-6H2l8-8 8 8h-5zM0 18h20v2H0v-2z" />
          </svg>
        </label>
        @error('image')
        <p class="text-xs text-red-400 italic">
          {{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label
          class="block text-gray-700 text-sm font-semibold mb-2">
          Caption
        </label>
        <input type="text" name="caption" class="w-full border px-2 py-1 rounded
    focus:border-blue-500 focus:shadow-outline outline-none
    @error('caption') border-red-500 @enderror"
          value="{{ old('caption') }}" required>
        @error('caption')
        <p class="text-xs text-red-400 italic">
          {{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <button type="submit"
          class="px-8 py-2 text-sm rounded text-white font-semibold
          bg-teal-500 focus:outline-none hover:bg-teal-400">Post
        </button>
      </div>

    </form>
  </div>
</x-master>