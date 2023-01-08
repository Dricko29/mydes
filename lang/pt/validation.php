<?php

declare(strict_types=1);

return [
    'accepted'             => 'O campo :attribute deverá ser aceite.',
    'accepted_if'          => 'O :attribute deve ser aceite quando o :other é :value.',
    'active_url'           => 'O campo :attribute não contém um URL válido.',
    'after'                => 'O campo :attribute deverá conter uma data posterior a :date.',
    'after_or_equal'       => 'O campo :attribute deverá conter uma data posterior ou igual a :date.',
    'alpha'                => 'O campo :attribute deverá conter apenas letras.',
    'alpha_dash'           => 'O campo :attribute deverá conter apenas letras, números e traços.',
    'alpha_num'            => 'O campo :attribute deverá conter apenas letras e números .',
    'array'                => 'O campo :attribute deverá conter uma coleção de elementos.',
    'ascii'                => 'The :attribute must only contain single-byte alphanumeric characters and symbols.',
    'before'               => 'O campo :attribute deverá conter uma data anterior a :date.',
    'before_or_equal'      => 'O Campo :attribute deverá conter uma data anterior ou igual a :date.',
    'between'              => [
        'array'   => 'O campo :attribute deverá conter entre :min - :max elementos.',
        'file'    => 'O campo :attribute deverá ter um tamanho entre :min - :max kilobytes.',
        'numeric' => 'O campo :attribute deverá ter um valor entre :min - :max.',
        'string'  => 'O campo :attribute deverá conter entre :min - :max caracteres.',
    ],
    'boolean'              => 'O campo :attribute deverá conter o valor verdadeiro ou falso.',
    'confirmed'            => 'A confirmação para o campo :attribute não coincide.',
    'current_password'     => 'A palavra-passe está incorreta.',
    'date'                 => 'O campo :attribute não contém uma data válida.',
    'date_equals'          => 'O campo :attribute tem de ser uma data igual a :date.',
    'date_format'          => 'A data indicada para o campo :attribute não respeita o formato :format.',
    'decimal'              => 'The :attribute must have :decimal decimal places.',
    'declined'             => 'O :attribute deve ser recusado.',
    'declined_if'          => 'O :attribute deve ser recusado quando :other é :value.',
    'different'            => 'Os campos :attribute e :other deverão conter valores diferentes.',
    'digits'               => 'O campo :attribute deverá conter :digits caracteres.',
    'digits_between'       => 'O campo :attribute deverá conter entre :min a :max caracteres.',
    'dimensions'           => 'O campo :attribute deverá conter uma dimensão de imagem válida.',
    'distinct'             => 'O campo :attribute contém um valor duplicado.',
    'doesnt_end_with'      => 'O campo :attribute não pode terminar com um dos seguintes: :values.',
    'doesnt_start_with'    => 'O campo :attribute não pode começar com um dos seguintes: :values.',
    'email'                => 'O campo :attribute não contém um endereço de e-mail válido.',
    'ends_with'            => 'O campo :attribute deverá terminar com : :values.',
    'enum'                 => 'O :attribute selecionado é inválido.',
    'exists'               => 'O valor selecionado para o campo :attribute é inválido.',
    'file'                 => 'O campo :attribute deverá conter um ficheiro.',
    'filled'               => 'É obrigatória a indicação de um valor para o campo :attribute.',
    'gt'                   => [
        'array'   => 'O campo :attribute tem de ter mais de :value itens.',
        'file'    => 'O campo :attribute tem de ter mais de :value quilobytes.',
        'numeric' => 'O campo :attribute tem de ser maior do que :value.',
        'string'  => 'O campo :attribute tem de ter mais de :value caracteres.',
    ],
    'gte'                  => [
        'array'   => 'O campo :attribute tem de ter :value itens ou mais.',
        'file'    => 'O campo :attribute tem de ter :value quilobytes ou mais.',
        'numeric' => 'O campo :attribute tem de ser maior ou igual a :value.',
        'string'  => 'O campo :attribute tem de ter :value caracteres ou mais.',
    ],
    'image'                => 'O campo :attribute deverá conter uma imagem.',
    'in'                   => 'O campo :attribute não contém um valor válido.',
    'in_array'             => 'O campo :attribute não existe em :other.',
    'integer'              => 'O campo :attribute deverá conter um número inteiro.',
    'ip'                   => 'O campo :attribute deverá conter um IP válido.',
    'ipv4'                 => 'O campo :attribute deverá conter um IPv4 válido.',
    'ipv6'                 => 'O campo :attribute deverá conter um IPv6 válido.',
    'json'                 => 'O campo :attribute deverá conter um texto JSON válido.',
    'lowercase'            => 'O campo :attribute deve ser em minúsculas.',
    'lt'                   => [
        'array'   => 'O campo :attribute tem de ter menos de :value itens.',
        'file'    => 'O campo :attribute tem de ter menos de :value quilobytes.',
        'numeric' => 'O campo :attribute tem de ser inferior a :value.',
        'string'  => 'O campo :attribute tem de ter menos de :value caracteres.',
    ],
    'lte'                  => [
        'array'   => 'O campo :attribute não pode ter mais de :value itens.',
        'file'    => 'O campo :attribute tem de ter :value quilobytes ou menos.',
        'numeric' => 'O campo :attribute tem de ser inferior ou igual a :value.',
        'string'  => 'O campo :attribute tem de ter :value caracteres ou menos.',
    ],
    'mac_address'          => 'O :attribute deve ser um endereço MAC válido.',
    'max'                  => [
        'array'   => 'O campo :attribute não deverá conter mais de :max elementos.',
        'file'    => 'O campo :attribute não deverá ter um tamanho superior a :max kilobytes.',
        'numeric' => 'O campo :attribute não deverá conter um valor superior a :max.',
        'string'  => 'O campo :attribute não deverá conter mais de :max caracteres.',
    ],
    'max_digits'           => 'O campo :attribute não pode ter mais do que :max digítos.',
    'mimes'                => 'O campo :attribute deverá conter um ficheiro do tipo: :values.',
    'mimetypes'            => 'O campo :attribute deverá conter um ficheiro do tipo: :values.',
    'min'                  => [
        'array'   => 'O campo :attribute deverá conter no mínimo :min elementos.',
        'file'    => 'O campo :attribute deverá ter no mínimo :min kilobytes.',
        'numeric' => 'O campo :attribute deverá ter um valor superior ou igual a :min.',
        'string'  => 'O campo :attribute deverá conter no mínimo :min caracteres.',
    ],
    'min_digits'           => 'O campo :attribute deve ter pelo menos :min digítos.',
    'multiple_of'          => 'O :attribute deve ser um múltiplo de :value',
    'not_in'               => 'O campo :attribute contém um valor inválido.',
    'not_regex'            => 'O formato de :attribute não é válido',
    'numeric'              => 'O campo :attribute deverá conter um valor numérico.',
    'password'             => [
        'letters'       => 'O campo :attribute deve conter pelo menos uma letra.',
        'mixed'         => 'O campo :attribute deve conter pelo menos uma maiúscula e uma minúscula.',
        'numbers'       => 'O campo :attribute deve conter pelo menos um número.',
        'symbols'       => 'O campo :attribute deve conter pelo menos um símbolo.',
        'uncompromised' => 'O campo :attribute apareceu numa fuga de dados. Por favor, escolha um :attribute diferente.',
    ],
    'present'              => 'O campo :attribute deverá estar presente.',
    'prohibited'           => 'O campo :attribute é proibido.',
    'prohibited_if'        => 'O campo :attribute é proibido quando :other é :value.',
    'prohibited_unless'    => 'O campo :attribute é proibido a menos que :other esteja em :values.',
    'prohibits'            => 'O campo :attribute proíbe :other de estar presente.',
    'regex'                => 'O formato do valor para o campo :attribute é inválido.',
    'required'             => 'É obrigatória a indicação de um valor para o campo :attribute.',
    'required_array_keys'  => 'O campo :attribute deve conter entradas para: :values.',
    'required_if'          => 'É obrigatória a indicação de um valor para o campo :attribute quando o valor do campo :other é igual a :value.',
    'required_if_accepted' => 'O campo :attribute é obrigatório quando :other foi aceite.',
    'required_unless'      => 'É obrigatória a indicação de um valor para o campo :attribute a menos que :other esteja presente em :values.',
    'required_with'        => 'É obrigatória a indicação de um valor para o campo :attribute quando :values está presente.',
    'required_with_all'    => 'É obrigatória a indicação de um valor para o campo :attribute quando um dos :values está presente.',
    'required_without'     => 'É obrigatória a indicação de um valor para o campo :attribute quando :values não está presente.',
    'required_without_all' => 'É obrigatória a indicação de um valor para o campo :attribute quando nenhum dos :values está presente.',
    'same'                 => 'Os campos :attribute e :other deverão conter valores iguais.',
    'size'                 => [
        'array'   => 'O campo :attribute deverá conter :size elementos.',
        'file'    => 'O campo :attribute deverá ter o tamanho de :size kilobytes.',
        'numeric' => 'O campo :attribute deverá conter o valor :size.',
        'string'  => 'O campo :attribute deverá conter :size caracteres.',
    ],
    'starts_with'          => 'O campo :attribute tem de começar com um dos valores seguintes: :values',
    'string'               => 'O campo :attribute deverá conter texto.',
    'timezone'             => 'O campo :attribute deverá ter um fuso horário válido.',
    'ulid'                 => 'The :attribute must be a valid ULID.',
    'unique'               => 'O valor indicado para o campo :attribute já se encontra registado.',
    'uploaded'             => 'O upload do ficheiro :attribute falhou.',
    'uppercase'            => 'O campo :attribute deve ser em maiúsculas.',
    'url'                  => 'O formato do URL indicado para o campo :attribute é inválido.',
    'uuid'                 => ':Attribute tem de ser um UUID válido.',
    'attributes'           => [
        'address'                  => 'address',
        'age'                      => 'age',
        'amount'                   => 'amount',
        'area'                     => 'area',
        'available'                => 'available',
        'birthday'                 => 'birthday',
        'body'                     => 'body',
        'city'                     => 'city',
        'content'                  => 'content',
        'country'                  => 'country',
        'created_at'               => 'created at',
        'creator'                  => 'creator',
        'current_password'         => 'current password',
        'date'                     => 'date',
        'date_of_birth'            => 'date of birth',
        'day'                      => 'day',
        'deleted_at'               => 'deleted at',
        'description'              => 'description',
        'district'                 => 'district',
        'duration'                 => 'duration',
        'email'                    => 'email',
        'excerpt'                  => 'excerpt',
        'filter'                   => 'filter',
        'first_name'               => 'first name',
        'gender'                   => 'gender',
        'group'                    => 'group',
        'hour'                     => 'hour',
        'image'                    => 'image',
        'last_name'                => 'last name',
        'lesson'                   => 'lesson',
        'line_address_1'           => 'line address 1',
        'line_address_2'           => 'line address 2',
        'message'                  => 'message',
        'middle_name'              => 'middle name',
        'minute'                   => 'minute',
        'mobile'                   => 'mobile',
        'month'                    => 'month',
        'name'                     => 'name',
        'national_code'            => 'national code',
        'number'                   => 'number',
        'password'                 => 'password',
        'password_confirmation'    => 'password confirmation',
        'phone'                    => 'phone',
        'photo'                    => 'photo',
        'postal_code'              => 'postal code',
        'price'                    => 'price',
        'province'                 => 'province',
        'recaptcha_response_field' => 'recaptcha response field',
        'remember'                 => 'remember',
        'restored_at'              => 'restored at',
        'result_text_under_image'  => 'result text under image',
        'role'                     => 'role',
        'second'                   => 'second',
        'sex'                      => 'sex',
        'short_text'               => 'short text',
        'size'                     => 'size',
        'state'                    => 'state',
        'street'                   => 'street',
        'student'                  => 'student',
        'subject'                  => 'subject',
        'teacher'                  => 'teacher',
        'terms'                    => 'terms',
        'test_description'         => 'test description',
        'test_locale'              => 'test locale',
        'test_name'                => 'test name',
        'text'                     => 'text',
        'time'                     => 'time',
        'title'                    => 'title',
        'updated_at'               => 'updated at',
        'username'                 => 'username',
        'year'                     => 'year',
    ],
];
