<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Cita</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f3f4f6; color: #374151; -webkit-font-smoothing: antialiased;">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f3f4f6; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="100%" max-width="600" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                    <tr>
                        <td style="display: flex; align-items:center; justify-content: space-between; background-color: #B0393F; padding: 30px; text-align: center;">
                            <div style="display: block;"> 
                                <img src="https://res.cloudinary.com/dxsufvxeu/image/upload/v1776494039/test1_efvniy.png" alt="DSAC Logo" style="height: 4rem; filter: brightness(0) invert(1); width: auto;" >
                            </div>
                            <div style="display: block;">
                                <h2 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: bold; letter-spacing: 1px;">
                                    Actualización de Cita
                                </h2>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 40px 30px;">
                            <h2 style="margin-top: 0; color: #B0393F; font-size: 22px; font-weight: bold;">¡Hubo cambios en tu cita!</h2>
                            
                            <p style="font-size: 16px; line-height: 24px; margin-bottom: 24px;">
                                Hola <strong>{{ $appointment->client->user->name ?? 'Cliente' }}</strong>,
                            </p>
                            
                            <p style="font-size: 16px; line-height: 24px; margin-bottom: 30px;">
                                Te informamos que algunos detalles de tu cita han sido actualizados. A continuación te presentamos la información más reciente:
                            </p>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px; margin-bottom: 30px;">
                                <tr>
                                    <td style="padding-bottom: 12px;">
                                        <strong style="color: #4b5563; margin-bottom: 10px;">Servicio solicitado:</strong><br>
                                        <span style="font-size: 16px; color: {{ in_array('service', $changes) ? '#B0393F; font-weight: bold;' : '#111827;' }}">{{ $appointment->service->name ?? 'N/A' }}</span>
                                        @if(in_array('service', $changes))
                                            <span style="font-size: 12px; color: #B0393F; margin-left: 5px;">(Actualizado)</span>
                                        @endif
                                    </td>
                                    <td style="padding-bottom: 12px;">
                                        <strong style="color: #4b5563; margin-bottom: 10px;">Atendido por:</strong><br>
                                        <span style="font-size: 16px; color: {{ in_array('employee', $changes) ? '#B0393F; font-weight: bold;' : '#111827;' }}">{{ $appointment->employee->user->name ?? 'N/A' }}</span>
                                        @if(in_array('employee', $changes))
                                            <span style="font-size: 12px; color: #B0393F; margin-left: 5px;">(Actualizado)</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 12px;">
                                        <strong style="color: #4b5563; margin-bottom: 10px;">Fecha y Hora:</strong><br>
                                        <span style="font-size: 16px; color: {{ in_array('date', $changes) ? '#B0393F; font-weight: bold;' : '#111827;' }}">{{ \Carbon\Carbon::parse($appointment->scheduled_at)->format('d M Y - H:i') }}</span>
                                        @if(in_array('date', $changes))
                                            <span style="font-size: 12px; color: #B0393F; margin-left: 5px;">(Actualizado)</span>
                                        @endif
                                    </td>
                                    <td style="padding-bottom: 12px;">
                                        <strong style="color: #4b5563; margin-bottom: 10px;">Estado del pago:</strong><br>
                                        <span style="font-size: 16px; color: {{ in_array('payment', $changes) ? '#059669; font-weight: bold;' : '#111827;' }}">{{ $appointment->payment_status === 'paid' ? 'Pagado' : ($appointment->payment_status === 'refunded' ? 'Reembolsado' : 'Pendiente') }}</span>
                                        @if(in_array('payment', $changes))
                                            <span style="font-size: 12px; color: #059669; margin-left: 5px;">(Actualizado)</span>
                                        @endif
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="padding-top: 10px; border-top: 1px solid #e5e7eb;">
                                        <strong style="color: #4b5563; margin-bottom: 10px;">Total a pagar:</strong><br>
                                        <span style="font-size: 16px; color: #111827; font-weight: bold;">${{ number_format($appointment->price, 2) }}</span>
                                    </td>
                                    <td style="padding-top: 10px; border-top: 1px solid #e5e7eb;">
                                        @if(in_array('status', $changes))
                                            <strong style="color: #4b5563; margin-bottom: 10px;">Estado de la Cita:</strong><br>
                                            <span style="font-size: 16px; color: #B0393F; font-weight: bold;">Confirmada</span>
                                            <span style="font-size: 12px; color: #B0393F; margin-left: 5px;">(Actualizado)</span>
                                        @endif
                                    </td>
                                </tr>
                                
                                @if(!empty($appointment->notes))
                                <tr>
                                    <td colspan="2" style="padding-top: 10px;">
                                        <strong style="color: #4b5563; margin-bottom: 10px;">Notas Adicionales:</strong><br>
                                        <span style="font-size: 15px; color: #4b5563; font-style: italic;">{{ $appointment->notes }}</span>
                                    </td>
                                </tr>
                                @endif
                            </table>
                            
                            <p style="font-size: 16px; line-height: 24px; margin-bottom: 15px;">
                                Por favor, intenta llegar <strong>15 minutos antes</strong> de tu cita.
                            </p>
                            <p style="font-size: 15px; color: #6b7280; line-height: 22px; margin-bottom: 30px;">
                                Si necesitas cancelar o reprogramar, por favor contáctanos lo antes posible o gestiona tu cita en la plataforma.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #f9fafb; padding: 25px 30px; text-align: center; border-top: 1px solid #e5e7eb;">
                            <p style="margin: 0; font-size: 14px; color: #6b7280;">
                                Gracias por confiar en nosotros.<br>
                                <div style="margin-top: 15px;">
                                    <img src="https://res.cloudinary.com/dxsufvxeu/image/upload/v1776494039/test1_efvniy.png" alt="DSAC Logo" style="height: 6rem; width: auto;" >
                                </div>
                            </p>
                        </td>
                    </tr>
                </table>
                <p style="text-align: center; font-size: 12px; color: #9ca3af; margin-top: 20px;">
                    Este es un mensaje automático, por favor no respondas a este correo.
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
