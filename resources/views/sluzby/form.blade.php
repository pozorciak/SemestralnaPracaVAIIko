<div class="form-group text-danger">
    @foreach($errors->all() as $error)
        {{$error}}<br>
    @endforeach
</div>

<div class="container">
    <form method="post" action="{{ $action }}">
        @csrf
        @method($method)
        <div class="row mt-3">
            <div class="col-md-12 bg-dark">
                <h1>Pridajte ponuku na spolujazdu</h1>
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control formular" name="meno" id="fname" pattern="[A-zÀ-ž]{2,}"
                               placeholder="Meno"
                               value="{{ old("meno", @$model->meno) }}"
                               required minlength="2" maxlength="50">
                        <div class="invalid-feedback">Prosím, zadajte meno</div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control formular" name="priezvisko" id="lname"
                               pattern="[A-zÀ-ž]{2,}"
                               placeholder="Priezvisko"
                               value="{{ old("priezvisko", @$model->priezvisko) }}"
                               required minlength="2" maxlength="50">
                        <div class="invalid-feedback">Prosím, zadajte priezvisko</div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 bg-dark">
                <div class="form-row">
                    <div class="col">
                        <input type="email" class="form-control formular" name="email" id="email"
                               placeholder="E-mail"
                               value="{{ old("email", @$model->email) }}"
                               required minlength="3" maxlength="50">
                        <div class="invalid-feedback">Prosím, zadajte e-mail</div>
                    </div>
                    <div class="col">
                        <input type="city" class="form-control formular" name="mesto" id="city"
                               pattern="^\S[A-zÀ-ž\s]{2,}"
                               placeholder="Mesto odkiaľ je ponúkaný odvoz"
                               value="{{ old("mesto", @$model->mesto) }}"
                               required minlength="2" maxlength="50">
                        <div class="invalid-feedback">Prosím, zadajte mesto</div>
                    </div>

                    <div class="col">
                        <input type="datetime-local" class="form-control formular" name="datum" id="fname"
                               placeholder="datum"
                               value="{{ old("datum", @$model->datum) }}"
                               required minlength="2" maxlength="50">
                        <div class="invalid-feedback">Prosím, zadajte dátum kedy ponúkate spolujazdu</div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 bg-dark">
                <div class="form-row">
                    <div class="col">
                            <textarea type="textarea" name="poznamka" class="form-control formular"
                                      placeholder="Poznámka.Tu upresnite informácie o mieste ."
                            >{{ old("poznamka", @$model->poznamka) }}</textarea>
                        <div class="invalid-feedback">Prosím, zadajte poznámku</div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 bg-dark ">
                {{--                <input type="submit" value="Odoslať">--}}

                <button type="submit" class="btn btn-primary">
                    Odoslať
                </button>
            </div>
        </div>
    </form>
</div>

