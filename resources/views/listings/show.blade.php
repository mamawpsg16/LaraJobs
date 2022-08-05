<x-layout>
@include('partials._search')
    <a href="/" class="inline-block text-black ml-4 mb-4"
    >   <i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img
                    class="w-48 mr-6 flex items-center justify-center mb-6"
                    src="{{$job->logo ? asset('storage/'.$job->logo) : asset('images/no-image.png')}}"
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{$job->title}}</h3>
                <div class="text-xl font-bold mb-4">{{$job->company}}</div>
                <x-listing-tags :tags="$job->tags"/>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{$job->location}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                        {{$job->description}}
                        </p>
                        <a
                            href="{{$job->email}}"
                            class="block bg-laravel text-center text-white mt-6 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-envelope"></i>
                            Contact Employer</a
                        >

                        <a
                            href="https://test.com"
                            target="_blank"
                            class="block bg-black text-white py-2 text-center rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-globe"></i>Website</a
                        >
                    </div>
                </div>
            </div>
        </x-card>
        {{-- <x-card class="mt-4 p2 flex space-x-6">
            <a href="/jobs/{{$job->id}}/edit">
            <i class="fa-solid fa-pencil"> Edit</i></a>
            <form action="/jobs/{{$job->id}}" method="post">
            @csrf
            @method('DELETE')
            <button><div class="fa-solid fa-trash"> Delete</div></button>
            </form>
        </x-card> --}}
    </div>
</x-layout>