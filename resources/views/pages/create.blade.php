@extends('layouts.backend')
@section('content')
<section style="background-color: #eee;">
    <div class="container py-3">
        <div class=" row">
            <div class="col-lg-12">
                <div class="card mb-4" style="height: 315px;background-size: cover !important; background: no-repeat url('../../../../images/violence.jpg')">
                    <form method="PUT">
                        @csrf
                        <div class=" card-body text-center">
                        <img class="profile-user-img img-fluid img rounded-circle"
                            src="{{ asset('images/default-img.png') }}" alt="avatar"
                            style="position: absolute;left:20px;bottom:-25px;width: 150px;border: 1px solid #eee;padding: 2px;">
                </div>
                </form>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card card-primary mb-4 p-4">
                <div class="form-header">
                    <h3 class="card-title"><img class="profile-user-img img-fluid img"
                            src="{{ asset('images/form.png') }}" alt="avatar" style="width: 50px;"> Formulaire de
                        création d'un nouveau utilisateur</h3>
                </div>
                <!-- form 2 -->
                <form method="POST" action="{{ route('users.create.store') }}">
                    @csrf
                    <div class="form-outline mb-4">
                        <label for="inputFirstName" class="form-label">Nom <span class="mandatory-star">*</span></label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-heart" viewBox="0 0 16 16">
                                    <path
                                        d="M9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276Z" />
                                </svg></span>
                            <input type="text" class="form-control" id="inputFirsttName" name="first_name"
                                placeholder="Saisir votre nom" required>
                            <div class="invalid-tooltip">Veuillez saisir votre nom.</div>
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="inputLasttName" class="form-label">Prénom <span class="mandatory-star">*</span></label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-heart" viewBox="0 0 16 16">
                                    <path
                                        d="M9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276Z" />
                                </svg></span>
                            <input type="text" class="form-control" id="inputLasttName" name="last_name"
                                placeholder="Saisir votre prénom" required>
                            <div class="invalid-tooltip">Veuillez saisir votre prénom.</div>
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="inputPhoneNo" class="form-label">Télephone</label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg></span>
                            <input type="text" class="form-control" id="inputPhoneNo" name="phone"
                                placeholder="Saisir votre numéro de télephone" />
                        </div>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-outline mb-4">
                        <label for="inputEmailAddress" class="form-label">Email <span class="mandatory-star">*</span></label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                </svg></span>
                            <input type="email" class="form-control" id="inputEmailAddress" name="email"
                                placeholder="Saisir votre email" />
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example27">Mot de passe <span class="mandatory-star">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-key-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                </svg></span>
                            <input type="password" name="password" class="form-control border-end-0"
                                id="inputChoosePassword" placeholder="Saisir votre mot de passe">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example27">Confirmation Mot de passe <span class="mandatory-star">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-key-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                </svg></span>
                            <input type="password" name="password_confirmation" class="form-control border-end-0"
                                id="inputChoosePasswordConfirm" placeholder="Saisir Confirmation mot de passe">


                        </div>

                    </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example27">Role</label>
                    <div class="input-group">
                        <select class="form-control" name="role">
                            @foreach ($roles as $role)
                            @if ($role->name == 'admin')
                            @continue
                            @endif
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>

                    </div>

                </div>




                <div class="row">


                    <div class="pt-1 mb-4" style="text-align: right;">
                        <button id="create-btn" type="submit" class="btn btn-success"><img
                                class="profile-user-img img-fluid img" src="{{ asset('images/save.png') }}" alt="avatar"
                                style="width: 20px;"> Enregistrer</button>
                        <a href="{{ route('users.index') }}" id="reset-btn" type="reset" class="btn btn-danger"><img
                                class="profile-user-img img-fluid img" src="{{ asset('images/cancel.png') }}"
                                alt="avatar" style="width: 20px;"> Annuler</a>

                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>
    </div>

    </div>


</section>
@endsection
