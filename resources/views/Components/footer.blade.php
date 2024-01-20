<div class="custom-shape-divider-top-1704809173 position-relative" style="margin-bottom: -10px;">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
</div>
<footer class="bg-primary-subtle">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/icons/icons8-book-100.png') }}" class="img-fluid" height="75" width="75" alt="">
                <span class="fw-bolder ms-3 h3 text-primary">Perpusnik</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <p class="text-center">Created by <a href="#" class="fw-bolder text-decoration-none">Cihils Syndicate @ <span id="cpydte"></span></a></p>
            </div>
        </div>
    </div>
</footer>
@push('scripts')
    <script>
        const date = new Date().getFullYear();
        $('#cpydte').text(date);
    </script>
@endpush
