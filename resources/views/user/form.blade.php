<div class="form-group text-danger">
    @foreach($errors->all() as $error)
        {{$error}}<br>
    @endforeach
</div>
<form method="post" action="{{ $action }}">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="name">Meno</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Meno" value="{{ old("name", @$model->name) }}">
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ old("email",@$model->email) }}">
    </div>
    <div class="form-group">
        <label for="password">Heslo</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Heslo">
    </div> <div class="form-group">
        <label for="password">Potvrdenie hesla</label>
        <input type="password" class="form-control" id="repeat_password" name="password_confirmation" placeholder="Heslo">
    </div>

    <button type="submit" class="btn btn-primary tlacidlo">Odoslať</button>
</form>
