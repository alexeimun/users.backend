<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin: 0">
    <tbody  bgcolor="#EBEEF0">
        <tr>
            <td>
                <table style="width: 100%; max-width: 600px; padding:0; margin:50px auto;"  align="center" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td bgcolor="#fff">

                                @if ($lang=='es')
                                    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="padding:0px;" background="https://storage.googleapis.com/aulasamigas/emails/images/password-reset.jpg">
                                @else
                                    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="padding:0px;" background="https://storage.googleapis.com/aulasamigas/emails/images/password-reset-en.jpg">
                                @endif
                                    <tbody>
                                        <tr>
                                            <td style="padding: 190px 15px 15px 15px; font-family: arial,serif; color:#fff;">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                        <tr bgcolor="#fff">
                            <td>
                                <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 0px 30px 25px 30px">
                                    <tbody>

                                        <tr width="100%">
                                            <td>
                                                <table align="center" cellpadding="0" cellspacing="0" border="0" style=" text-align: center; font-family: arial,serif; padding:0px; width:100%; max-width: 300px; margin-bottom: 40px; margin-top: 40px;">
                                                    <tbody>
                                                        <tr>
                                                            <td style="text-align: center;">
                                                                @if ($contest)
                                                                    <a target="_blank" style="display: block; text-decoration: none; color:white; border-radius: 60px; background: #009ED5; font-size: 14px; cursor: pointer; padding:18px 40px; " href='{{ url("http://plataforma.aulasamigas.com/auth/reset/validate?concurso=1&token=$passwordReset->token")}}'>{{ trans('reset.Change') }}</a>
                                                                @else
                                                                    <a target="_blank" style="display: block; text-decoration: none; color:white; border-radius: 60px; background: #009ED5; font-size: 14px; cursor: pointer; padding:18px 40px; " href='{{ url("http://plataforma.aulasamigas.com/auth/reset/validate?token=$passwordReset->token")}}'>{{ trans('reset.Change') }}</a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <p style=" text-align: center; font-size:14px; font-family: arial,serif; color: #666666; font-weight: bold;">{{ trans('reset.NoReply') }}</p> 
                                            </td>
                                        </tr>

                                        <tr width="100%">
                                            <td>
                                                <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="margin-top: 50px;">
                                                    <tbody>
                                                        <tr>
                                                            <td width="100%" align="center">
                                                                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                        <tr width="100%" >
                                                                            <td>
                                                                                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="margin-bottom: 30px;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="padding:0px; font-size:14px; text-align:left; font-family: arial,serif; color: #666666; padding-left: 15px;">
                                                                                                <p style="margin: 0px;">{{ trans('reset.Att') }}</p>
                                                                                                <p style="margin: 0px;">{{ trans('reset.Team') }} <strong style="color:#666666"><a>{{ trans('reset.App') }}</a></strong></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td align="center" style="padding:0px; font-size:14px; text-align:left; font-family: arial,serif; color: #666666;">
                                                                            
                                                                                <p style="color: #23566E; margin-bottom:10px;">{{ trans('reset.Follow') }}</p>
                                                                                <a href="https://www.facebook.com/aulasamigas/" target="_blank"><img src="https://storage.googleapis.com/amigas_identity/icons/facebook.png" width="26" height="26" border="0" alt=""/></a>
                                                                                <a style="margin-left: 15px;" href="https://twitter.com/aulasamigas" target="_blank"><img src="https://storage.googleapis.com/aulasamigas/emails/icons/twitter.jpg" width="26" height="26" border="0" alt=""/></a>
                                                                                <a style="margin-left: 15px;" href="https://www.instagram.com/aulasamigas/" target="_blank"><img src="https://storage.googleapis.com/aulasamigas/emails/icons/instagram.jpg" width="26" height="26" border="0" alt=""/></a>
                                                                                <a style="margin-left: 15px;" href="https://www.youtube.com/user/aulasamigastv" target="_blank"><img src="https://storage.googleapis.com/aulasamigas/emails/icons/youtube.jpg" width="26" height="26" border="0" alt=""/></a>
                                                                            </td>
                                                                            <td align="right" style="padding: 0px;">
                                                                                <img src="https://storage.googleapis.com/aulasamigas/emails/images/logo-aulasamigas.jpg" width="95" height="95"/>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" style="padding-top:15px; font-size:10px; text-align:justify; font-family: arial,serif; color: #999999">{{ trans('reset.Comment') }}</td>
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