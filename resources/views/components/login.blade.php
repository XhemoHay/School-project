<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
 

     @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    

<div class="flex items-center justify-center h-lvh bg-gradient-to-tr from-green-300 via-blue-500 to-purple-600">
<form class="max-w-sm mx-auto bg-white rounded p-6"   method="POST" action="/users/login">
  @csrf
     <div class="mb-5">
       <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
       <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required>
       @error('email')
       <p style="color:red;">{{$message}}</p>
       @enderror
     </div>
     <div class="mb-5">
       <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
       <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
       @error('email')
       <p style="color:red;">{{$message}}</p>
       @enderror
     </div>
     <div class="flex items-start mb-5">
       {{-- <div class="flex items-center h-5">
         <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
       </div>
       <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label> --}}
     </div>
     <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm w-full sm:w-full px-5 py-2.5 text-center">Submit</button>
   </form>
</div>
        

    
</body>
</html>