<x-master>
  <div class="flex">

    <div class="w-2/3 mx-auto">
      {{-- profile section --}}
      <div class="p-4 pb-6 mb-4 rounded shadow">
        <div class="flex items-center">
          {{-- image --}}
          <div class="w-1/4">
            <img
            src="{{$profile->avatar_path ?? 'https://picsum.photos/200'}}"
            alt="profile image"
            class="h-full w-full rounded-full">
          </div>

          {{-- profile info --}}
          <div
          class="flex-1 ml-5 text-sm text-gray-800 py-2">
          <div class="flex items-end mb-2">
            <a class="text-gray-900 font-semibold hover:underline"
            href="#">{{'@' . $profile->username}}</a>

            {{-- vue component --}}
            @auth
            <follow-button class="ml-2"
            user-id="{{ $profile->id }}"
            follows="{{ $follows }}">
          </follow-button>
          @endauth
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
        {{ $profile->bio ?? '. . .' }}
      </p>
    </div>
  </div>

  @can ('update', $profile)
  <div class="text-right">
    <a class="mr-2 text-sm text-teal-400 hover:text-teal-500 hover:underline"
    href="{{$profile->path('edit')}}">
    Edit Profile
  </a>
  <a class="py-2 px-4 text-sm  rounded
  bg-teal-400 text-white hover:bg-teal-500"
  href="{{ route('posts.create') }}">Create
  Post</a>
</div>
@endcan
</div>

{{-- button group --}}
<div
class="flex justify-center mb-6 text-sm text-gray-800">
<button
class="px-2 py-1 text-gray-700 font-semibold bg-gray-400
rounded-l border border-gray-400
focus:outline-none hover:bg-gray-500">Post
</button>
<button
class="px-2 py-1 font-semibold text-gray-700 border rounded-r border-gray-400
focus:outline-none hover:bg-gray-500">Tagged
</button>
</div>
{{-- post --}}
<div class="rounded shadow p-4 pb-6">
  <div class="flex justify-between flex-wrap">
    @forelse ($posts as $post)
    <div
    class="p-2 pb-4 mb-3 rounded border border-teal-400"
    style="width: 32%;">
    @can('update', $post)

    <div class="mb-2 text-xs text-right">
      <a href="{{$post->path('edit')}}"
        class="text-blue-400">Edit</a>
        <button class="text-red-400"
        onclick="event.preventDefault();
              document.querySelector('#postDelete-{{$post->id}}').submit()">Delete
            </button>

            <form id="postDelete-{{$post->id}}"
              action="{{ $post->path('destroy') }}"
              method="POST" class="hidden">
              @csrf
              @method('DELETE')
            </form>
          </div>
          @endcan
          <img src="{{ $post->image_path }}"
          alt="post image"
          class="w-full h-48 rounded">
          <p
          class="mt-4 text-center text-xs text-gray-700 italic">
          {{$post->caption }}
        </p>
      </div>
      @empty
      <p class="font-semibold text-gray-700">
        There are currently no post
      </p>
      @endforelse
    </div>
  </div>
    </div>
  <div class="flex flex-col w-1/6 p-2 shadow rounded text-sm text-blue-500">
@foreach ($following as $user)
  <a href="/profile/{{$user->id}}"
    class="mb-2 hover:text-blue-700 hover:underline"
    >{{'@' . $user->username}}</a>
@endforeach
  </div>
</div>
</x-master>