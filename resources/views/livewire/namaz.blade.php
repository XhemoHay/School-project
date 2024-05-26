<div>



    <div class="pt-4  sm:p-0 md:p-3 lg:p-2 xl:p-4 2xl:p-4   border-dashed rounded-lg  mt-14 ">



        <div class=" mb-4 rounded bg-gray-50" style="max-width: 700px;">

            @if (session('message'))
            <div wire:poll.5s="hideMessage" role="alert">
             <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                Students saved 
             </div>

            </div> 
    
           @endif

              <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-6">
                

               <form wire:submit.prevent="saveSalah">
                               
                  <div class="flex justify-between m-3 ">
                           <select wire:model="selectedSalah"  class="bg-gray-50 border m-4 border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500  p-2.5 ">                         
                            <option >Select Salah</option>
                             <option value="Sabah">Sabah</option>
                             <option value="Dhuhr">Dhuhr</option>
                           </select>



                           <select wire:model="selectedClass" wire:change="updateClass"  class="bg-gray-50 border m-4 border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="classFilter" id="classFilter">
                             <option >Select Class</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" >
                                    {{ $class->name }}
                                </option>
                            @endforeach
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
                                 <p> prezime</p>
                              </td>
                              <td class="px-4 py-3 text-center">
                                 <input type="checkbox" wire:model="selectedStudents" value="{{ $student->id }}">
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
                  
                  <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" type="submit">Save</button>
             </form> 
              </div>
            
             
        </div>

  </div>

</div>
