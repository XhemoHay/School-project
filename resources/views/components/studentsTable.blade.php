

<div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-3">
     <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
         <thead class="text-md text-gray-700 uppercase bg-gray-50  ">
             <tr>
                 <th scope="col" class="px-6 py-3">
                     Name
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Class
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Category
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Price
                 </th>
                 <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                 <th scope="col" class="px-6 py-3 text-center">
                     Action
                 </th>
             </tr>
         </thead>
         <tbody>
           <div class="flex justify-between items-center  mx-4 mb-2">
            <h1 class="text-lg font-bold">List of studets</h1>
            <div class="w-56">


            <form  method="GET" action="/students">             
                @csrf
                @if(auth()->user() && (auth()->user()->role === 'ADMIN' || auth()->user()->role === 'EDUCATOR'))
                <select class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " name="classFilter" id="classFilter" onchange="this.form.submit()">
                    <option value="">All Classes</option>
                    @foreach($classes as $class)
                        <option  value="{{ $class->id }}" {{ request('classFilter') == $class->id ? 'selected' : '' }}>
                            {{ $class->name }}
                        </option>
                    @endforeach
                </select>
                @endif
            </form>

           </div>
          </div>

            @if($students)
          @foreach($students as $student)
             <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                 <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $student->name }}
                 </th>
                 <td class="px-6 py-4">
                    @if ($student->course)
                    {{ $student->course->name }}
                @else
                    No Class Assigned
                @endif
                 </td>
                 <td class="px-6 py-4">
                     Laptop
                 </td>
                 <td class="px-6 py-4">
                     $2999
                 </td>
                 <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                 <td class="px-6 py-4 text-center">
                     <a href="{{ route('student.show', ['student' => $student->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
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
     <div class="p-2 flex justify-center">
        @if ($students)
        {{ $students->appends(request()->query())->links('pagination::bootstrap-4') }}
        @endif
    </div>
    
 </div>

      <!-- This will display the pagination links -->

 