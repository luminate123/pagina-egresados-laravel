<x-layout>

    <x-tabnav>
        
        <x-slot:DNI>{{$usuario->DNI}}</x-slot:DNI>
        <x-slot:Nombres>{{$usuario->nombres}}</x-slot:Nombres>
        <x-slot:Ap_Paterno>{{$usuario->Apellido_Paterno}}</x-slot:Ap_Paterno>
        <x-slot:Ap_Materno>{{$usuario->Apellido_Materno}}</x-slot:Ap_Materno>
        @if(is_null($perfil))
        <x-slot:prop></x-slot:prop>
        <x-slot:tipo_date>date</x-slot:tipo_date>
        <x-slot:require>required</x-slot:require>
        <x-slot:fecha></x-slot:fecha>
        <x-slot:prop1></x-slot:prop1>
        <x-slot:prop2></x-slot:prop2>
        <x-slot:nacionalidad></x-slot:nacionalidad>
        @else
        <x-slot:fecha>{{$perfil->fecha_nacimiento}}</x-slot:fecha>
        <x-slot:nacionalidad>{{$perfil->nacional}}</x-slot:nacionalidad>
        <x-slot:require></x-slot:require>
        <x-slot:prop>disabled</x-slot:prop>
        <x-slot:tipo_date>text</x-slot:tipo_date>
            @if($perfil->genero == 'Masculino')
                <x-slot:prop1>checked="checked"</x-slot:prop1>
                <x-slot:prop2></x-slot:prop2>
            @else
                <x-slot:prop1></x-slot:prop1>
                <x-slot:prop2>checked="checked"</x-slot:prop2>
            @endif

        @endif

    </x-tabnav>

</x-layout>