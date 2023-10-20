@extends('client.layouts.layout')

@section('content')
    <!-- Comming soon -->
    <section class="comming section-padding text-center">
        <div class="v-middle">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h1>404</h1>
                        <h2>Not Found!</h2>
                        <h6>Sorry We Can't Find That Page!</h6>
                        <p>The page you are looking for was moved, removed, renamed or never existed.</p>
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <form>
                                    <input type="text" name="search" placeholder="Search" required>
                                    <button>Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-md-12">
                        <a href='index.html' class="link-btn"><span class="ti-arrow-left"></span> Home Page </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
