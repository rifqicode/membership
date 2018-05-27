@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="emailInput" class="form-group{{ $errors->has('email') ? ' has-error' : '' }} ">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" onchange="checkingEmail(this)" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <span style="display:none;" id="error-message"class="help-block"><font color="red">Email Already Exits</font></span>
                                <span style="display:none;" id="success-message"class="help-block"><font color="green">Email can be use</font></span>
                                <span style="display:none;" id="notvalid-message"class="help-block"><font color="red">Enter a valid email</font></span>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function checkingEmail(email) {
  $.ajax({
    type: 'GET',
    url: '/get/findEmailIfSame/' + email.value,
    success: function( msg ) {
      var emailValidate = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      var errMessage = document.getElementById('error-message');
      var sMessage = document.getElementById('success-message');
      var vaMessage = document.getElementById('notvalid-message');
      var checking = emailValidate.test(String(email.value).toLowerCase());

      if (checking == true) {
        if (msg == 0) {
          sMessage.style.display = "block";
          errMessage.style.display = "none";
          vaMessage.style.display = "none";
        } else {
          errMessage.style.display = "block";
          sMessage.style.display = "none";
          vaMessage.style.display = "none";
        }
      } else if (checking == false) {
        vaMessage.style.display = "block";
        errMessage.style.display = "none";
        sMessage.style.display = "none";
      }
    },
    error: function ( err ){
      console.log(err);
    }
  })
}
</script>
@endsection
