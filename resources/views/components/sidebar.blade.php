<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-slate-800 border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
     <div class="h-full px-2 pb-4 pt-4 overflow-y-auto bg-slate-800 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">

          <li>
               <a href="/day" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-slate-100 group">
                    <x-fas-chart-pie  class="w-5 h-5 text-slate-100 transition duration-75  group-hover:text-slate-800"/> 
                  <span class="ms-3 text-slate-100 group-hover:text-slate-800">Dashboard</span>
               </a>
            </li>

           <li>
              <a href="/students" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <x-heroicon-s-users  class="w-5 h-5 text-slate-100 transition duration-75  group-hover:text-slate-800"/>
                 <span class="ms-3 text-slate-100 group-hover:text-slate-800 whitespace-nowrap">Students</span>
              </a>
           </li>
           <li>
               <a href="/admin/problems" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <x-phosphor-note-pencil-bold  class="w-5 h-5 text-slate-100 transition duration-75  group-hover:text-slate-800" />
                  <span class="ms-3 text-slate-100 group-hover:text-slate-800 whitespace-nowrap">izjava</span>
               </a>
            </li>
            <li>
               <a href="{{ route('prayers.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <x-fas-mosque   class="w-5 h-5 text-slate-100 transition duration-75  group-hover:text-slate-800" />
                  <span class="ms-3 text-slate-100 group-hover:text-slate-800 whitespace-nowrap">Namaz</span>
               </a>
            </li>

        </ul>
     </div>
  </aside>