@extends('layouts.simple')
@section('content')
<section class="vh-100" style="background-color: #d6c6bf;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{ asset('images/capture.PNG') }}" alt="login form" class="img-fluid"
                                style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <div id="show_success_alert"></div>
                                <form method="POST" action="{{ route('register') }}">


                                    @csrf
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <h1 class="fw-bold mb-2 fs-1">
                                            VIRA<span class="text-danger">G</span>E
                                        </h1>
                                    </div>


                                    <div class="form-outline mb-4">
                                        <label for="inputFirstName" class="form-label">Nom *</label>
                                        <div class="input-group"> <span class="input-group-text bg-transparent"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-person-heart" viewBox="0 0 16 16">
                                                    <path
                                                        d="M9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276Z" />
                                                </svg></span>
                                            <input type="text" class="form-control" id="inputFirsttName"
                                                name="first_name" placeholder="Saisir votre nom" required>
                                            <div class="invalid-tooltip">Veuillez saisir votre nom.</div>
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label for="inputLasttName" class="form-label">Prénom *</label>
                                        <div class="input-group"> <span class="input-group-text bg-transparent"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-person-heart" viewBox="0 0 16 16">
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
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-telephone-fill"
                                                    viewBox="0 0 16 16">
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
                                        <label for="inputEmailAddress" class="form-label">Email </label>
                                        <div class="input-group"> <span class="input-group-text bg-transparent"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
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
                                        <label class="form-label" for="form2Example27">Mot de passe</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-transparent"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
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
                                        <label class="form-label" for="form2Example27">Confirmation Mot de passe</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-transparent"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                </svg></span>
                                            <input type="password" name="password_confirmation" class="form-control border-end-0"
                                                id="inputChoosePassword" placeholder="Saisir Confirmation mot de passe">


                                        </div>

                                    </div>


                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example27">Role</label>
                                        <div class="input-group">
                                            <select class="form-control" name="role">
                                                    @foreach ($roles as $role)
                                                        @if ($role->name == "admin")
                                                            @continue
                                                        @endif
                                                            <option>{{ $role->name }}</option>
                                                    @endforeach
                                            </select>

                                        </div>

                                    </div>


                                    <div class="row">


                                        <div class="pt-1 mb-4">
                                            <button id="register-btn" type="submit" class="btn btn-danger">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-box-arrow-in-right"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                                                    <path fill-rule="evenodd"
                                                        d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                                </svg>
                                                 S'inscrire
                                            </button>
                                        </div>

                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Avez-vous déjà de compte?
                                            <a  href="{{ route('login') }}" style="color: #393f81;">Se connecter</a></p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</section>
@endsection
