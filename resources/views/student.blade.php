@extends('layout')

@section('content')


<div class="pt-4 sm:ml-64 sm:p-0 md:p-3 lg:p-2 xl:p-4 2xl:p-4">
     <div class="pt-4  sm:p-0 md:p-3 lg:p-2 xl:p-4 2xl:p-4   border-dashed rounded-lg  mt-14 ">

        <div class="grid grid-cols-1  sm:grid-cols-5 gap-8 mb-8">
            <div class="flex justify-center items-center text-2xl h-24 rounded bg-white shadow-sm">
              <p>{{$student->course->name}}</p>
           </div>
           <div class="flex justify-center items-center text-2xl h-24 rounded bg-white shadow-sm col-span-1 sm:col-span-2 md:col-span-2">
               <p>{{$student->name}}</p>
           </div>
           <div class="flex justify-center items-center text-2xl h-24 rounded bg-white shadow-sm">
               <p>{{$countProb}}</p>
           </div>
           <div class="flex justify-center items-center text-2xl h-24 rounded bg-white shadow-sm">
            <p>{{$countPrayer}}</p>
           </div>

        </div>

        
        @include('components/writeIzjava')


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2  xl:grid-cols-2 gap-4 mb-4">


          <div class=" rounded bg-white dark:bg-gray-800 mb-6">
            <div class="relative overflow-x-auto">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                      <tr>
                          <th scope="col" colspan="1" class="px-6 py-4">
                              Title
                          </th>
                          <th scope="col" colspan="2" class="px-6 py-4" style="width: 70%;">
                              Description
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                    @if($prayers)
                    @foreach($prayers as $prayer)
                      <tr class="bg-white border-b">
                          <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                            {{ $prayer->salah }}
                          </th>
                          <td colspan="2" class="px-4 py-3" style="width: 70%;">
                            {{ $prayer->created_at }}
                          </td>  
                      </tr>
                      @endforeach
                      @endif
                  </tbody>
              </table>
          </div>
          </div>

         <div class=" rounded bg-white dark:bg-gray-800">
          <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" colspan="1" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" colspan="2" class="px-6 py-3" style="width: 70%;">
                            Description
                        </th>
                    </tr>
                </thead>
                <tbody>
                  @if($problems)
                  @foreach($problems as $problem)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap">
                          {{ $problem->title }}
                        </th>
                        <td colspan="2" class="px-4 py-4" style="width: 70%;">
                          {{ $problem->description }}
                        </td>  
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>            
       </div>
      
      </div>
      
      
        
     </div>
  </div>




@endsection