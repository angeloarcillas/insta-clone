<x-master>

    <div class="w-1/3 mx-auto p-4 rounded shadow">
        <form class="" action="/post"
            method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-4">

                <label
                    class="mx-2 px-4 py-2 text-sm rounded text-gray-800 border focus:outline-none hover:bg-gray-100 inline-flex items-center justify-between">

                    <input class="hidden"
                        type="file">
                    Upload file

                    <svg class="w-4 h-4 fill-current ml-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M13 10v6H7v-6H2l8-8 8 8h-5zM0 18h20v2H0v-2z" />
                    </svg>
                </label>

            </div>
            <div class="mb-4">

                <label
                    class="block">Caption</label>
                <input type="text" name="caption"
                    class="w-full border">
            </div>
            <button type="submit"
                class="btn btn-primary my-2 px-5">Post</button>
        </form>
    </div>
</x-master>