<div class=" mb-6 rounded bg-gray-50 dark:bg-gray-800">
     <div id="accordion-collapse" data-accordion="collapse">
       <h2 id="accordion-collapse-heading-2">
         <button type="button" class="flex items-center justify-between rounded-t shadow-sm w-full p-4 font-medium rtl:text-right text-gray-500 border  border-gray-200 focus:ring-1 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
           <span>Pisi Izjavu!</span>
           <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
           </svg>
         </button>
       </h2>
       <div id="accordion-collapse-body-2" class="hidden p-4 shadow-sm" aria-labelledby="accordion-collapse-heading-2">
          
        
        
        
        <form method="POST" action="/problems">
          @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" name="title" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="title.." required>
                    </div>
                    <div>
                       
                        <input type="hidden" name="student_id" id="last_name" value="{{ $student->id }}"  readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required>
                      </div>
                 </div>
                  <div class="mb-6">
                         <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
                         <textarea id="message" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Write your thoughts here..."></textarea>
                  </div>
                  <div class="flex justify-end">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
                  </div>
               </form>    
               
               

        </div>             
      </div>
 </div>