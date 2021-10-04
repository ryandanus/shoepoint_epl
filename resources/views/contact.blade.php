@extends('layouts.app')

@section('content')
    <div class="container my-4 py-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="contact-title">Need to get in touch? Contact us.</h1>
                <h3 class="contact-subtitle">Inquiries, Questions, or even just saying hello.</h3>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <form action="{{ route('contact-send') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="firstname">First Name *</label>
                                <input id="firstname" name="firstname" type="text" class="form-control" placeholder="John" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Doe">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input id="email" name="email" type="text" class="form-control" placeholder="johndoe@email.com" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Messages *</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Your message here..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                </form>
            </div>
        </div>
    </div>

    {{-- JAVASCRIPT --}}
    <script type="text/javascript">
        title = "Contact Us | Shoepoint.id";
    </script>
@endsection