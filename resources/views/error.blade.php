<!DOCTYPE html>
<html lang="en">


<head>
    @include('components.head')
</head>

<body>
  <div class="page-layout">

    <div class="error-full-wrapper">
      <div class="row g-xl-7 g-5 justify-content-center">
        <div class="col-md-5">
          <div class="pe-lg-5">
            <div id="error001">
              <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.9.14/dist/dotlottie-wc.js" type="module">
              </script>
              <dotlottie-wc src="https://lottie.host/aa0f6dd1-ec22-49e1-99ea-ca6c1a235d53/hp4XuyzaJL.lottie"
                style="width: 500px;height: 500px; margin-right: 25rem" autoplay loop></dotlottie-wc>
            </div>
          </div>
        </div>
        <div class="col-md-6 align-self-center">
          <h2 class="error-heading mb-3">Something
            <br> Went Wrong
          </h2>
          <p class="error-text mb-5">Sorry we were unable to find that page</p>
          <a href={{route('dashboard')}} class="btn btn-primary waves-effect waves-light">
            <i class="fi fi-rr-arrow-small-left scale-4x me-1"></i> Back To Dashboard
          </a>
        </div>
      </div>
    </div>

  </div>
  <!-- begin::NexLink Page Scripts -->
  <script src={{asset("assets/libs/global/global.min.js")}}></script>
  <script src={{asset("assets/libs/lottiefiles/lottie.min.js")}}></script>
  <script src={{asset("assets/js/lottie.js")}}></script>
  <script src={{asset("assets/js/appSettings.js")}}></script>
  <script src={{asset("assets/js/main.js")}}></script>
  <!-- end::NexLink Page Scripts -->
</body>


</html>