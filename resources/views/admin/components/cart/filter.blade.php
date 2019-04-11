<div class="row">
    <div class="container col-md-9 col-md-offset-9">
        <p class="lead">Izaberite korisnika</p>
        <div class="form-group">
            <div class="form-line">
                <select id="user" name="user">
                    <option value="0">Svi korisnici</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <input type="button" class="cartSearch btn btn-primary waves-amber" value="Pretrazi">
        </div>
    </div>
</div>