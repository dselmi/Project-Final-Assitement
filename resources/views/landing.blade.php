@extends('layouts.simple')
<p class="text-center">
<img src="{{ asset('images/ministere.jpg') }}" alt="ministere" width="150" height="100">
<img src="{{ asset('images/moussawat.jpg') }}" alt="ministere" width="150" height="100">
<img src="{{ asset('images/unfpa.jpg') }}" alt="ministere" width="150" height="100">
<img src="{{ asset('images/union_europeenne.jpg') }}" alt="ministere" width="150" height="100">
<img src="{{ asset('images/tmass.jpg') }}" alt="ministere" width="150" height="100">
<img src="{{ asset('images/unftk.jpg') }}" alt="ministere" width="150" height="100">
</p>
@section('content')
  <!-- Hero -->
  <div class="hero bg-body-extra-light">
    <div class="hero-inner">
      <div class="content content-full text-center">
        <h1 class="fw-bold mb-2 fs-1">
          VIRA<span class="text-danger">G</span>E
        </h1>
        <h3 class="fw-bold mb-2">
          De Femmes Victimes de Violences<img src="{{ asset('images/femme.PNG') }}" alt="ministere" width="50" height="50">à Femmes Actrices de Changements<img src="{{ asset('images/heureuse.PNG') }}" alt="ministere" width="60" height="60">
          <br><br>
        </h3>
        <h1 class="fw-bold mb-2">
          <span class="text-warning">Qu’est-ce que le projet « VIRAGE » ?</span><br>
        </h1>
        <div class="shadow-lg p-3 mb-5 bg-body rounded">
        <p class="fst-italic fw-bold">Le projet « VIRAGE, de Femmes Victimes de Violence à Femmes Actrices de
              Changement », vise à mettre en place un modèle durable d'intervention auprès
              des femmes victimes de violences et/ou vulnérables dans les gouvernorats de
              Kairouan et du grand Tunis, pour leur garantir la sécurité, la santé et le bienêtre
              grâce à des services d'accueil, d’écoute, de prise en charge multisectorielle et
              d’autonomisation socio-économique.</p>
            </p>
</div>
        <h1 class="fw-bold mb-2">

        </h1>

<br>

        <a class="btn btn-outline-danger btn-lg" href="/login">
          <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Login
        </a>
        <a class="btn btn-outline-secondary btn-lg" href="/register">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-hearts" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566ZM9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z"/>
          </svg> Register
        </a>
      </div>
    </div>
  </div>
  <!-- END Hero -->

@endsection
