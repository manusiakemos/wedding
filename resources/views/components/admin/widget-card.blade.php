<div class="bg-gradient-to-r from-gray-700 to-gray-800 text-gray-500 rounded-lg p-5 shadow-l">
   <div class="flex justify-between items-center">
       <div>
           <span class="text-sm capitalize text-gray-100">{{$title}}</span>
           <div class="mt-5">
               <span class="font-display text-white font-bold">{{$number}}</span>
           </div>
       </div>

       <div class="bg-red-100 h-12 w-12 ring-4 ring-red-400 p-5 rounded-xl flex items-center justify-center ml-5">
            {{$slot}}
       </div>
   </div>
</div>
