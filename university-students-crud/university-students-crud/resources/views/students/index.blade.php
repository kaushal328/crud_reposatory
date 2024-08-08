<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('students.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Student</a>

                    <table class="mt-4 w-full border border-gray-200">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Student Name</th>
                                <th class="border border-gray-300 px-4 py-2">Class</th>
                                <th class="border border-gray-300 px-4 py-2">Teacher</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $student->student_name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $student->class }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $student->teacher->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('students.edit', $student->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                     <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
