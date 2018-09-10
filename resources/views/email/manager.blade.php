@extends('email.emailMaster')

@section('message_content')

    <p>Hi</p>
    <p>
        We're thrilled to have you on board.
    </p>

    <p>
        follow the link below to setup your account and start using
    </p>

    <div style="padding: 5px; border: 1px solid #ccc;">
        {{url('/admin/verify/'.$email_token)}}
    </div>
    <br><br>
    <p>
        If you have any questions, feedback or suggestions feel free to reply to this email.
    </p>
    <p>
        Thank you
    </p>

@stop

@section('footer')


@stop
