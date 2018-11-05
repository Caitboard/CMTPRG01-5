@if(count($errors) > 0)
    <div class="row">
        <div class="col-md-4 col-md-offset-4 alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

{{--With this if statement we check all the fields in the sign up form and display errors
based on our validation in the UserController--}}

@if(Session::has('message'))
    <div class="row">
        <div class="col-md-4 col-md-offset-4 alert alert-success" role="alert">
           {{ Session::get('message') }}
        </div>
    </div>
@endif
