<x-master>
    @forelse ($posts as $post)
    <div class="p-2 pb-4 mb-3 rounded border border-teal-400"
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
</x-master>