@extends('layouts.simple')
@section('content')
<section class="vh-100" style="background-color: #d6c6bf;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="{{ asset('images/capture.PNG') }}"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" action="{{ route('resetPassword') }}">
                    @csrf
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <h1 class="fw-bold mb-2 fs-1">
                        VIRA<span class="text-danger">G</span>E
                    </h1>
                  </div>


                  <div class="form-outline mb-4">
                  

                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example27"> Ancien Mot de passe</label>
                    <div class="input-group">
													<span class="input-group-text bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                              <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg></span>
													<input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Saisir votre ancien mot de passe">
												</div>
                                                <label class="form-label" for="form2Example27"> Nouveau Mot de passe</label>
                    <div class="input-group">
													<span class="input-group-text bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                              <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg></span>
													<input type="password" name="newpassword" class="form-control border-end-0" id="inputChoosePassword" placeholder="Saisir votre nouveau mot de passe">
												</div>
                                                <label class="form-label" for="form2Example27">Confirmer nouveau Mot de passe</label>
                    <div class="input-group">
													<span class="input-group-text bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                              <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg></span>
													<input type="password" name="confirmpassword" class="form-control border-end-0" id="inputChoosePassword" placeholder="Confirmer votre mot de passe">
												</div>
                    
                  </div>
                    @if($errors->any())
										         <div class="alert alert-danger alert-dismissible">
										                  {{$errors->first()}}
										          </div>
										        @endif
                  <div class="pt-1 mb-4">
                    <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
  <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
</svg></i> Enregistrer</button>
                  </div>

                  
                  <img src="{{ asset('images/proverbe.PNG') }}"
                      alt="login form" class="img-fluid"  width="300" height="200"/>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
