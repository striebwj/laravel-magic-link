@extends('layouts.email')

@section('preheader', 'Here is your magic link! Click it to sign in.')

@section('content')
<tr>
  <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
    <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
      <!-- Body content -->
      <tr>
        <td class="content-cell">
          <div class="f-fallback">
            <h1>Hey!</h1>
            <p>Here is your magic login link for {{ config('app.name') }}:</p>
            <!-- Action -->
            <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
              <tr>
                <td align="center">
                  <!-- Border based button
https://litmus.com/blog/a-guide-to-bulletproof-buttons-in-email-design -->
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                    <tr>
                      <td align="center">
                        <a href="{{$magic_link}}" class="f-fallback button" target="_blank">Login to {{ config('app.name') }}</a>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <p>If you have any questions, feel free to <a href="mailto:support@{{ config('app.name') }}.ca">email our customer success team</a>. (We're lightning quick at replying.) We also offer <a href="https://{{config('app.domain')}}">live chat</a> during business hours.</p>
            <p>Thanks,
              <br>Wade Striebel and the {{ config('app.name') }} Team</p>
            <p class="f-fallback sub"><strong>P.S.</strong> Need immediate help getting started? Just reply to this email, the {{ config('app.name') }} support team is always ready to help!</p>
            <!-- Sub copy -->
            <table class="body-sub" role="presentation">
              <tr>
                <td>
                  <p class="f-fallback sub">If you’re having trouble with the button above, copy and paste the URL below into your web browser.</p>
                  <p class="f-fallback sub">{{$magic_link}}</p>
                </td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
    </table>
  </td>
</tr>
@endsection
