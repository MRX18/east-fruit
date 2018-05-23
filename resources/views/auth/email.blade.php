@extends('layouts.app')

@section('content')
<div class="container">
    <script src="//ulogin.ru/js/ulogin.js"></script>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Подтверждение E-mail</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('cod') ? ' has-error' : '' }}">
                            <label for="cod" class="col-md-4 control-label">Код</label>

                            <div class="col-md-6">
                                <input id="cod" type="text" class="form-control" name="cod" required autofocus>

                                @if ($errors->has('cod'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cod') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Подтвердить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
