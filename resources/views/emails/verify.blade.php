<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin: 0">
    <tbody  bgcolor="#EBEEF0">
        <tr>
            <td>
                <table style="width: 100%; max-width: 600px; padding:0; margin:50px auto;"  align="center" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td bgcolor="#fff">
                                <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="padding:0px;">
                                    <tbody>
                                        <tr>
                                            <td align="center" style="padding: 0px;">
                                                @if ($lang=='es')
                                                    <img src="https://storage.googleapis.com/aulasamigas/emails/images/register-validate.png" width="100%">
                                                @else
                                                    <img src="https://storage.googleapis.com/aulasamigas/emails/images/register-validate-en.jpg" width="100%">
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>    
                        <tr bgcolor="#fff">
                            <td>
                                <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 45px 30px 20px 30px">
                                    <tbody>
                                        <tr width="100%">
                                            <td style="text-align: center; font-family: arial,serif; padding:0px;">
                                                <table align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%; max-width: 300px; margin-bottom: 40px;">
                                                    <tbody>
                                                        <tr>
                                                            <td style="text-align: center;">
                                                                <a target="_blank" style="display: block; text-decoration: none; color:white; border-radius: 60px; background: #009ED5; font-size: 14px; cursor: pointer; padding:18px 40px; " href='{{ url("http://plataforma.aulasamigas.com/auth/register/validate?code=$user->code") }}'>{{ trans('verify.Confirm') }}<br>{{ trans('verify.To') }} <b>{{ trans('verify.ConfAccount') }}</b></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p style="color:#666666; font-size: 12px; font-family: arial,serif; "><strong>{{ trans('verify.NoReply') }}</strong></p>
                                            </td>
                                        </tr>

                                        <tr width="100%">
                                            <td>
                                                <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 0px;">
                                                    <tbody>
                                                        <tr>
                                                            <td style="padding: 40px 0px 0px 0px;" width="100%" align="center">
                                                                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td align="center" style="padding:0px; font-size:14px; text-align:left; font-family: arial,serif; color: #666666;">

                                                                                <p style="color:#666666; margin: 0px;">{{ trans('verify.Att') }}</p>
                                                                                <p style="color:#666666; margin: 0px;">{{ trans('verify.Team') }} <strong style="color:#666666">{{ trans('verify.App') }}</strong></p>
                                                                                <p style="color: #23566E;  margin-top:45px; margin-bottom:5px;">{{ trans('verify.Follow') }}</p>

                                                                                <a href="https://www.facebook.com/aulasamigas/" target="_blank"><img src="https://storage.googleapis.com/amigas_identity/icons/facebook.png" width="26" height="26" border="0" alt=""/></a>
                                                                                <a href="https://twitter.com/aulasamigas" target="_blank"><img src="https://storage.googleapis.com/amigas_identity/icons/twitter.png" width="26" height="26" border="0" alt=""/></a>
                                                                                <a href="https://www.instagram.com/aulasamigas/" target="_blank"><img src="https://storage.googleapis.com/amigas_identity/icons/instagram.png" width="26" height="26" border="0" alt=""/></a>
                                                                                <a href="https://www.youtube.com/user/aulasamigastv" target="_blank"><img src="https://storage.googleapis.com/amigas_identity/icons/youtube.png" width="26" height="26" border="0" alt=""/></a>
                                                                            </td>
                                                                            <td align="right" style="padding: 0px;">
                                                                                <img src="https://storage.googleapis.com/amigas_identity/img/mandrill/formacion/Maildebienvenida2-13.png" width="240" height="140"/>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" style="padding-top:30px; font-size:10px; text-align:justify; font-family: arial,serif; color: #999999">{{ trans('verify.Comment') }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>