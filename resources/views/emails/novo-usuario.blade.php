<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Nosso Sistema</title>
</head>
<body style="box-sizing: border-box; font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; width: 100% !important;">
    <div style="box-sizing: border-box; background-color: #ffffff; color: #718096; height: 100%; line-height: 1.4; margin: 0; padding: 0; width: 100% !important;">
        <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; background-color: #edf2f7; margin: 0; padding: 0; width: 100%;">
            <tr>
                <td align="center" style="box-sizing: border-box; padding: 25px 0; text-align: center;">
                    <a href="http://localhost:8989" style="box-sizing: border-box; color: #3d4852; font-size: 19px; font-weight: bold; text-decoration: none; display: inline-block;" target="_blank">
                        <img src="https://laravel.com/img/notification-logo.png" alt="Laravel Logo" style="box-sizing: border-box; max-width: 100%; border: none; height: 75px; max-height: 75px; width: 75px;">
                    </a>
                </td>
            </tr>
        </table>
        
        <table width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; background-color: #edf2f7; border-bottom: 1px solid #edf2f7; border-top: 1px solid #edf2f7; margin: 0; padding: 0; width: 100%;">
            <tr>
                <td width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; background-color: #ffffff; border-color: #e8e5ef; border-radius: 2px; border-width: 1px; margin: 0 auto; padding: 0; width: 570px;">
                    <table align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; background-color: #ffffff; border-color: #e8e5ef; border-radius: 2px; border-width: 1px; margin: 0 auto; padding: 32px; width: 100%;">
                        <tr>
                            <td style="box-sizing: border-box; max-width: 100vw; padding: 32px;">
                                <h1 style="box-sizing: border-box; color: #3d4852; font-size: 18px; font-weight: bold; margin-top: 0; text-align: left;">Olá, {{ $user->name }}!</h1>
                                <p style="box-sizing: border-box; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Você está recebendo este e-mail para definir sua senha de acesso ao Sistema.</p>
                                <table align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; margin: 30px auto; padding: 0; text-align: center; width: 100%;">
                                    <tr>
                                        <td align="center" style="box-sizing: border-box;">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box;">
                                                <tr>
                                                    <td style="box-sizing: border-box;">
                                                        <a href="{{ $senhaTemporaria }}" style="box-sizing: border-box; border-radius: 4px; color: #fff; display: inline-block; overflow: hidden; text-decoration: none; background-color: #2d3748; border-bottom: 8px solid #2d3748; border-left: 18px solid #2d3748; border-right: 18px solid #2d3748; border-top: 8px solid #2d3748;" target="_blank">
                                                            Criar Senha
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <p style="box-sizing: border-box; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Este link de definição de senha expirará em 60 minutos.</p>
                                <p style="box-sizing: border-box; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Se você não solicitou uma definição de senha, nenhuma ação adicional será necessária.</p>
                                <p style="box-sizing: border-box; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Atenciosamente,<br>Laravel</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        
        <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; border-top: 1px solid #e8e5ef; margin-top: 25px; padding-top: 25px;">
            <tr>
                <td style="box-sizing: border-box;">
                    <p style="box-sizing: border-box; line-height: 1.5em; margin-top: 0; text-align: left; font-size: 14px;">Se você estiver com problemas para clicar no botão "Criar Senha", clique neste link ou copiei e cole em seu navegador: {{ $senhaTemporaria}}
