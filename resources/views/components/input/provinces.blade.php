<div>
   <div x-cloak
        x-data="{
            provinces: {{$provinces}},
            value: @entangle($attributes->wire('model')->value())
        }">
       <div class="py-3">
           <label for="provinces">Provinsi</label>
           <select name="provinces" id="provinces" class="mt-1 block w-full rounded-md dark:bg-gray-600 bg-gray-200 border-transparent focus:border-red-400 focus:bg-gray-200 dark:focus:bg-gray-800 focus:ring-0 text-sm text-gray-700 dark:text-gray-200" x-model="value" x-on:change="$dispatch('input')">
               <template x-for="item in provinces">
                   <option :value="item.id" x-text="item.name"></option>
               </template>
           </select>
       </div>


   </div>
</div>
