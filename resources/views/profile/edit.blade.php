<x-master>
  <div class="w-2/3 mx-auto">
    <div class="p-4 rounded shadow">
      <form action="{{$profile->path('update')}}"
        method="post"
        enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <div class="mb-4">
          <label
            class="block text-gray-700 text-sm font-semibold mb-2">Username</label>
          <input type="text" name="username"
            class="w-full border px-2 py-1 rounded
    focus:border-blue-500 focus:shadow-outline outline-none
    @error('caption') border-red-500 @enderror"
            value="{{$profile->username}}"
            required autofocus>

        </div>
        <div class="mb-4">
          <label class="px-4 py-2 text-sm rounded
          text-gray-800 border focus:outline-none
          hover:bg-gray-100 inline-flex items-center
          justify-between">
            <input class="hidden" type="file"
              name="image" autofocus
              required>Upload Avatar
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
      </form>
    </div>
  </div>
</x-master>