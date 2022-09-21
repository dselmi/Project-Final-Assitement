@extends('layouts.backend')
@section('content')
<div class="content header-title-content">
<div class="block-content block-content-full ">
            <div class="d-flex justify-content-between align-items-center">
            <h5 class="flex-grow-1 fw-semibold my-2 my-sm-3">
                <img class="profile-user-img img-fluid img " src="{{asset('images/accueil.png')}}" alt="avatar"
                    style="width: 30px;border-radius: 50%"> Editer un utilisateur
            </h5>
        <br>
     </div>
<section>
<div class="col-xl-10 mx-auto portlets ui-sortable">
						<div class="card border-top border-0 border-4 border-primary">
                    <form class="card-body px-5" method="POST" action="{{ route('users.edit.update',$user->id) }}">
                                    @csrf

                    <div class="form-outline mb-4">
                        <label for="inputFirstName" class="form-label">Nom *</label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-heart" viewBox="0 0 16 16">
                                    <path
                                        d="M9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276Z" />
                                </svg></span>
                            <input type="text" class="form-control" id="inputFirsttName" name="first_name" value="{{ $user->first_name }}"
                                placeholder="Saisir votre nom" required>
                            <div class="invalid-tooltip"></div>
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
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-heart" viewBox="0 0 16 16">
                                    <path
                                        d="M9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276Z" />
                                </svg></span>
                            <input type="text" class="form-control" id="inputLasttName" name="last_name"
                                placeholder="Saisir votre prénom" value="{{ $user->last_name }}" required>
                            <div class="invalid-tooltip"></div>
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
                                placeholder="Saisir votre numéro de télephone" value="{{ $user->phone }}" />
                        </div>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-outline mb-4">
                        <label for="inputEmailAddress" class="form-label">Email *</label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                </svg></span>
                            <input type="email" class="form-control" id="inputEmailAddress" name="email"
                                placeholder="Saisir votre email" value="{{ $user->email }}" />
                            <div class="invalid-tooltip"></div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">


                        <div class="pt-1 mb-4" style="text-align: right">
                            <button id="register-btn" type="submit" class="btn btn-sm btn-primary" style="width: 150px"> Enregistrer</button>
                        </div>

                    </div>
                   </form>

                </div>
            </div>
    </div>
    </div>
</section>
</div>
</div>
@endsection
