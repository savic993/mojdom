<div class="products-right-grid">
    <div class="products-right-grids">
        <div class="sorting">
            <label>Popust:</label>
            <select name="ddlAction" id="ddlAction" class="frm-field required sect">
                <option value="0">Izaberi</option>
                @foreach($actions as $action)
                    <option value="{{ $action->id }}">{{ $action->discount }}%</option>
                @endforeach
            </select>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>