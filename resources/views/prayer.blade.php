@extends('layout')

@section('content')

<div class="pt-4 sm:ml-64 sm:p-0 md:p-3 lg:p-2 xl:p-4 2xl:p-4">

     {{-- <div class="pt-4  sm:p-0 md:p-3 lg:p-2 xl:p-4 2xl:p-4   border-dashed rounded-lg  mt-14 ">

          <div class=" mb-4 rounded bg-gray-50" style="max-width: 700px;">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-3">

                  <div class="flex justify-end mx-4 mb-2 ">

                    <form  method="GET" action="{{ route('prayers.index') }}">             
                        @csrf
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="classFilter" id="classFilter" onchange="this.form.submit()">
                        <option value="">All Classes</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}" {{ $selectedClassFilter == $class->id ? 'selected' : '' }}>
                                {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                    </form>

                </div>


                 <form method="POST" action="{{ route('prayers.store') }}">
                                   @csrf 
                            <div class="flex justify-end mx-4 ">
                             <select name="salah" class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500  p-2.5 ">
                              
                                <option value="" {{ old('salah', $selectedSalahFilter) == '' ? 'selected' : '' }}>Select Namaz!</option>
                                <option value="Sabah" {{ old('salah', $selectedSalahFilter) == 'Sabah' ? 'selected' : '' }}>Sabah</option>
                                <option value="Dhuhr" {{ old('salah', $selectedSalahFilter) == 'Dhuhr' ? 'selected' : '' }}>Dhuhr</option>
                                <option value="Ikindija" {{ old('salah', $selectedSalahFilter) == 'Ikindija' ? 'selected' : '' }}>Ikindija</option>
                                <option value="Aksam" {{ old('salah', $selectedSalahFilter) == 'Aksam' ? 'selected' : '' }}>Aksam</option>
                                <option value="Jacija" {{ old('salah', $selectedSalahFilter) == 'Jacija' ? 'selected' : '' }}>Jacija</option>

                             </select>
                            </div>

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-md text-gray-700 uppercase bg-gray-50  ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Last name
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Checks
                                </th>
                            </tr>
                        </thead>
                        <tbody>
             
                           @if($students)
                         @foreach($students as $student)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 ">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">
                                   {{ $student->name }}
                                </th>
                                <td class="px-4 py-3">
                                   <p>Prezime</p>
                                </td>
                                <td class="px-4 py-3 text-center">
                                   <input type="checkbox" name="students[]" value="{{ $student->id }}">
                                </td>
                            </tr>
                           @endforeach
                           @else
                           <tr>
                               <td colspan="5" class="px-6 py-4 text-center font-medium text-gray-900 dark:text-white">
                                   No students found.
                               </td>
                           </tr>
                       @endif


                           
                        </tbody>
                            
                    </table>     
                    
                    <button class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" type="submit">Save</button>
               </form> 
                </div>
              
               
          </div>

    </div> --}}

    <livewire:namaz /> 
</div>


 
@endsection