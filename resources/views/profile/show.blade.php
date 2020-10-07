<x-master>
  <div class="w-2/3 mx-auto">
    {{-- profile section --}}
    <div class="p-4 pb-6 mb-4 rounded shadow">
      <div class="flex items-center">
        {{-- image --}}
        <div class="w-1/4">
          <img src="https://picsum.photos/200"
            alt="profile image"
            class="h-full w-full rounded-full">
        </div>

        {{-- profile info --}}
        <div
          class="flex-1 ml-5 text-sm text-gray-800 py-2">
          <div class="flex items-end mb-2">
            <a class="text-gray-900 font-semibold hover:underline"
              href="#">{{ $profile->username ?? ''}}</a>

            {{-- vue component --}}
            <follow-button class="ml-2"
              user-id="{{ $profile->id }}"
              follows="{{ $follows }}">
            </follow-button>
          </div>


          <div class="flex mb-2 text-xs">
            <p>
              <span>{{ $profile->post_count }}</span>
              Post
            </p>
            <p class="mx-2">
              <span>{{ $profile->followers_count }}</span>
              Followers
            </p>
            <p>
              <span>{{ $profile->following_count }}</span>
              Following
            </p>
          </div>
          <p class="">{{ $profile->user->name}}
          </p>
          <a class="block text-xs text-gray-700 hover:text-teal-400 hover:underline"
            href="#">{{ $profile->url ?? '' }}</a>
          <p
            class="mt-2 mb-6 text-sm text-gray-700">
            {{ $profile->description ?? '. . .' }}
          </p>
        </div>
      </div>

      <div class="text-right">
        @can ('update', $profile)
        <a class="mr-2 text-sm text-teal-400 hover:text-teal-500 hover:underline"
          href="/profile/{{ $profile->id }}/edit">
          Edit Profile
        </a>
        @endcan
        <a class="py-2 px-4 text-sm  rounded
            bg-teal-400 text-white hover:bg-teal-500"
          href="/posts/create">Create Post</a>
      </div>
    </div>

    {{-- button group --}}
    <div
      class="flex justify-center mb-6 text-sm text-gray-800">
      <button
        class="px-3 py-1 text-white bg-teal-400
        rounded-l border border-teal-400
        focus:outline-none hover:bg-teal-500"
        >Post
      </button>
      <button
        class="px-3 py-1 border rounded-r border-teal-400
          focus:outline-none hover:bg-teal-300"
          >Tagged
      </button>
    </div>

    {{-- post --}}
  <div class="p-4 rounded shadow">
    <div class="flex justify-around flex-wrap">
      @forelse ($profile->user->posts as $post)
      <div>
        <img src="/storage/{{ $post->image }}"
          alt="post image" class="w-full"
          height="80%">
        <p
          class="text-center text-xs text-gray-700">
          {{$post->caption }}
        </p>
      </div>
      @empty
      <p
        class="text-center font-semibold text-gray-700">
        There are currently no post
      </p>
      @endforelse
    </div>
  </div>
</x-master>