    <?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => '<p>El campo <b> :attribute </b> no coincide.</p>',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => '<p>El campo <b>:attribute</b> debe ser un email valido.</p>',
    'exists'               => 'The selected :attribute is invalid.',
    'filled'               => 'The :attribute field is required.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => '<p> El archivo del campo <b> :attribute </b> no puede ser mayor a :max kb.</p>',
        'string'  => '<p>El campo <b> :attribute </b> debe tener menos de :max caracteres.</p>',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => '<p>Este tipo de archivo no es admitido.</p>',//'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => '<p>El campo <b> :attribute </b> debe tener mínimo <b> :min </b> digitos.</p>',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'El campo :attribute  debe tener mínimo :min  caracteres.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => '<p>En el campo <b> :attribute </b>, solo se aceptan números.</p>',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'El campo :attribute  es requerido.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => '<p>Este <b> :attribute </b> ya ha sido registrado.</p>',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'service' => [
            'required' => '<p>Debe seleccionar el <b>tipo de servicio<b> que va a prestar.</p>',
        ],
        'location' => [
            'required' => '<p>Seleccione la <b>Ubicación</b> donde piensa prestar el servicio.</p>'
        ],
        'date' => [
            'required' => '<p>Es necesario que ingrese una <b>fecha</b> o <b>rango de fechas</b> en las que prestará el servicio.</p>'
        ],
        'type1' => [
            'required' => '<p>Debe adjuntar la copia de su cédula.</p>',
        ],
        'type2' => [
            'required' => '<p>Debe adjuntar sus antecedentes de procuraduría.</p>',
        ],
        'type3' => [
            'required' => '<p>Debe adjuntar su RUT.</p>',
        ],
        'type4' => [
            'required' => '<p>Debe adjuntar la copia de un recibo de servicio público.</p>',
        ],
        'type5' => [
            'required' => '<p>Debe adjuntar su certificado de cuenta bancaria.</p>',
        ],
        'type6' => [
            'required' => '<p>Debe adjuntar su certificado de contraloría.</p>',
        ],
        'type7' => [
            'required' => '<p>Debe adjuntar sus antecedentes judiciales.</p>',
        ],
        'countFiles' => [
            'in' => '<p>Debes subir mínimo 3 imágenes</p>'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => 'Nombre',
        'last_name' => 'Apellido',
        'description' => 'Descripción',
        'identification-number' => 'Número de identificación',
        'email' => 'Email',
        'password' => 'Contraseña',
        'profile_image' => 'Imágen de perfil',
        'cellphone' => 'Número de celular',
        'user_identification' => 'Número de identificación',
        'phone' => 'Número de teléfono',
        'address' => 'Dirección',
        'sector' => 'Sector',
        'country' => 'País',
        'city' => 'Ciudad',
        'company' => 'Empresa',
        'activities' => 'Actividad',
        'what-i-do' => 'A qué me dedico',
        'mobile-1' => 'Teléfono movil',
        'price' => 'Precio',
        'pets-quantity' => 'Número de mascotas',
    ],

];
