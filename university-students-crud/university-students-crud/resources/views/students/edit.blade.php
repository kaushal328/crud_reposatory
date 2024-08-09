<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="student_name" class="block text-sm font-medium text-gray-700">Student Name</label>
                            <input type="text" name="student_name" id="student_name" value="{{ $student->student_name }}" class="mt-1 block w-full" required @error('student_name') is-invalid @enderror>
                        </div>

                        <div class="mb-4">
                            <label for="teacher_id" class="block text-sm font-medium text-gray-700">Class Teacher</label>
                            <select name="teacher_id" id="teacher_id" class="mt-1 block w-full" required @error('teacher_id') is-invalid @enderror>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ $student->teacher_id == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="class" class="block text-sm font-medium text-gray-700">Class</label>
                            <input type="text" name="class" id="class" value="{{ $student->class }}" class="mt-1 block w-full" required @error('class') is-invalid @enderror>
                        </div>

                        <div class="mb-4">
                            <label for="admission_date" class="block text-sm font-medium text-gray-700">Admission Date</label>
                            <input type="date" name="admission_date" id="admission_date" value="{{  $student->admission_date }}" class="mt-1 block w-full" required >
                        </div>

                        <div class="mb-4">
                            <label for="yearly_fees" class="block text-sm font-medium text-gray-700">Yearly Fees</label>
                            <input type="number" name="yearly_fees" id="yearly_fees" value="{{ $student->yearly_fees }}" class="mt-1 block w-full" step="0.01" required>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                        <a href="{{ route('students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
