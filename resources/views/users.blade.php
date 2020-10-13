<x-master>
  <div class="w-1/3 p-6 mx-auto rounded shadow">
    <div class="flex flex-col text-blue-500">
      @foreach ($users as $user)
      <a href="{{$user->profile->path('show')}}"
        class="mb-2 hover:text-blue-700 hover:underline"
        >
        {{'@' . $user->profile->username}}
      </a>
      @endforeach
    </div>
  </div>
  </x-master>