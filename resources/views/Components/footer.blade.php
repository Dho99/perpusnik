<footer class="bg-primary-subtle">
    <div class="container py-3">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/icons/icons8-book-100.png') }}" class="img-fluid" alt="">
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
