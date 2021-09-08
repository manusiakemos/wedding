<div>
    <div class="my-3">
        <label for="province">Provinsi</label>
        <select name="province" id="province" class="form-select" wire:model="selectedProvince">
            <option value="">Pilih Provinsi</option>
            @foreach($provinces as $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
        </select>
    </div>

    @if($selectedProvince)
        <div class="my-3">
            <label for="city">Kota/Kabupaten</label>
            <select name="city" id="city" class="form-select" wire:model="selectedCity">
                <option value="">Pilih Kota/Kabupaten</option>
                @foreach($cities->cities as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
        </div>
    @endif
</div>
