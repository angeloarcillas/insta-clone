<x-master>
    <div class="w-2/3 p-4 mx-auto rounded shadow">
        <div class="flex items-center">
            <div class="w-1/4">
                <img
                  src="https://picsum.photos/200"
                  alt="profile image"
                  class="h-full w-full rounded-full"
                 >
            </div>

            <div class="flex-1 ml-5">
                <div
                    class="flex justify-between">
                    <h2 class="mb-0">
                        {{ $profile->title ?? '' }}

                        <follow-button
                            class="inline"
                            user-id="{{ $profile->id }}"
                            follows="{{ $follows }}">
                        </follow-button>
                    </h2>
                    @can ('update', $profile)
                    <a href="/posts/create">Add New
                        Post</a>
                    @endcan
                </div>
                @can ('update', $profile)
                <div class="mb-2">
                    <a
                        href="/profile/{{ $profile->id }}/edit">Edit
                        Profile</a>
                </div>
                @endcan
                <div>
                    <span><strong>{{ $profile->post_count }}</strong>
                        post </span>
                    <span
                        class="mx-2"><strong>{{ $profile->followers_count }}</strong>
                        followers </span>
                    <span><strong>{{ $profile->following_count }}</strong>
                        following </span>
                </div>
                <div class="row">
                    <p class="mb-0 mt-3">
                        <strong>{{$profile->user->email}}</strong>
                    </p>
                </div>
                <div class="row">
                    <p class="my-0">
                        {{ $profile->description ?? '' }}
                    </p>
                </div>
                <div class="row">
                    <a
                        href="{{ $profile->url ?? ''}}">{{ $profile->url ?? ''}}</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="btn-group mx-auto">
                <a class="border-top border-dark btn-sm py-2 px-5 mr-3"
                    href="#post">Post</a>
                <a class="btn btn-outline-info btn-sm py-2 px-5"
                    href="#tagged">Tagged</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">

                </div>
                <div
                    class="col-10 d-flex justify-content-around flex-wrap">
                    @foreach ($profile->user->posts as $post)
                    <a
                        href="/post/{{ $post->id }}">
                        <div class="border border-success m-2"
                            style="max-width:200px;">
                            <img src="  /storage/{{ $post->image }}"
                                alt="post image"
                                width="100%"
                                height="80%">
                            <p
                                class="text-center">
                                {{$post->caption }}
                            </p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-master>