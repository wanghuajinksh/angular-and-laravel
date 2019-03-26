<!-- Show Errors if any -->
@if($errors->any())
    <h4 class="error">El Registro del perfil ha fallado  </h4>
    <h4>Por favor verifica los siguientes campos:
        @foreach($errors->keys() as $field)
            <span class="errorItem">{{str_replace('_id',' ', $field)}}{{ ( ! $loop->last) ? ', ': '' }}</span>
        @endforeach
    </h4>
    </br>
@endif