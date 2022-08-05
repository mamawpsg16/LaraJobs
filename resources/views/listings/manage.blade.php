<x-layout>
    <x-card class="p-10">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($jobs->isEmpty())
                    @foreach($jobs as $job)
                        <tr class="border-gray-300">
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                                <a href="/jobs/{{$job->id}}">
                                    {{$job->title}}
                                </a>
                            </td>
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                                <a
                                    href="/jobs/{{$job->id}}/edit"
                                    class="text-blue-400 px-6 py-2 rounded-xl"
                                    ><i
                                        class="fa-solid fa-pen-to-square"
                                    ></i>
                                    Edit</a
                                >
                            </td>
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                                <form action="/jobs/{{$job->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button><span class="fa-solid fa-trash"></span>Delete</button>
                                </form>
                            </td>
                        </tr>       
                    @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-top border-bottom border-gray-300 text-lg">
                        <p class="text-center">No Jobs Found</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>