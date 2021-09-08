<div class="my-3">
    <label for="{{$key}}" class="text-sm">{{$label}}</label>
    {{$slot}}

    @error($model)
    <div class="text-red-500 font-normal text-sm py-1">{{ $message }}</div>
    @enderror
</div>
