@foreach($ajax_item as $d)

<div class="form-group">
    <label>Nama Item</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="item_name" value="{{ $d->item_name}}" readonly>
    </div>
</div>

@endforeach