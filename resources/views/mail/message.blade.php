@component('mail::message')
#Hola Empleado
Para leer el mensaje, haz clic en el botón

@component('mail::panel')
{{$message->body}}
@endcomponent

@component('mail::button',['url' => route('messages.show',$message)])
Ver mensaje
@endcomponent

@component('mail::subcopy')
Todos los derechos reservados | Software Cootrasana
@endcomponent

@endcomponent
