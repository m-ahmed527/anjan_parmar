@forelse ($attributes as $attribute)
    <div class="form-group col-md-4">
        <label>{{ $attribute['attribute']['name'] }}</label>
        <select name="attributes[{{ $attribute['attribute']['slug'] }}]" class="form-control variant-dropdown">
            <option value="">Select {{ $attribute['attribute']['name'] }}</option>
            @forelse ($attribute['variants'] as $variant)
                <option value="{{ $variant['slug'] }}">{{ $variant['name'] }}</option>
            @empty
            @endforelse
        </select>
    </div>

@empty

@endforelse
<div class="form-group col-md-4">

    <label for="">price</label>
    <input type="number" class="form-control" name="price" id="">

</div>
<div class="form-group col-md-4">

    <label for="">quantity</label>
    <input type="number" class="form-control" name="price" id="">
</div>
<div class="form-group col-md-12 d-flex justify-content-end">
    <a href="javascript:void(0)" class="btn btn-danger btn-md remove-attribute"><i class="fas fa-trash"></i></a>
</div>
