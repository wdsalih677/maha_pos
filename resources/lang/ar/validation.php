<?php

return [
    'accepted' => 'يجب قبول :attribute.',
    'active_url' => 'ليست :attribute عنوان URL صالحًا.',
    'after' => 'يجب أن يكون :attribute تاريخًا بعد :date.',
    'after_or_equal' => 'يجب أن يكون :attribute تاريخًا بعد أو مساويًا لـ :date.',
    'alpha' => 'قد تحتوي :attribute على حروف فقط.',
    'alpha_dash' => 'قد تحتوي :attribute على حروف وأرقام وشرطات وشرطات سفلية.',
    'alpha_num' => 'قد تحتوي :attribute على حروف وأرقام فقط.',
    'array' => 'يجب أن تكون :attribute مصفوفة.',
    'before' => 'يجب أن يكون :attribute تاريخًا قبل :date.',
    'before_or_equal' => 'يجب أن يكون :attribute تاريخًا قبل أو مساويًا لـ :date.',
    'between' => [
        'numeric' => 'يجب أن تكون :attribute بين :min و :max.',
        'file' => 'يجب أن تكون :attribute بين :min و :max كيلوبايت.',
        'string' => 'يجب أن تكون :attribute بين :min و :max حرفًا.',
        'array' => 'يجب أن تحتوي :attribute على :min و :max عنصرًا.',
    ],
    'boolean' => 'يجب أن تكون حقل :attribute صحيحة أو خاطئة.',
    'confirmed' => 'تأكيد :attribute غير مطابق.',
    'date' => 'ليست :attribute تاريخًا صالحًا.',
    'date_equals' => 'يجب أن يكون :attribute تاريخًا مساويًا لـ :date.',
    'date_format' => 'لا يتطابق :attribute مع الشكل :format.',
    'different' => 'يجب أن تكون :attribute و :other مختلفين.',
    'digits' => 'يجب أن تكون :attribute :digits رقمًا.',
    'digits_between' => 'يجب أن تكون :attribute بين :min و :max رقمًا.',
    'dimensions' => 'لـ :attribute أبعاد صورة غير صالحة.',
    'distinct' => 'لدى حقل :attribute قيمة مكررة.',
    'email' => 'يجب أن تكون :attribute عنوان بريد إلكتروني صالحًا.',
    'ends_with' => 'يجب أن تنتهي :attribute بواحد من الآتي: :values.',
    'exists' => 'العنصر المختار :attribute غير صالح.',
    'file' => 'يجب أن تكون :attribute ملفًا.',
    'filled' => 'يجب أن يحتوي حقل :attribute على قيمة.',
    'gt' => [
        'numeric' => 'يجب أن تكون :attribute أكبر من :value.',
        'file' => 'يجب أن تكون :attribute أكبر من :value كيلوبايت.',
        'string' => 'يجب أن تكون :attribute أكبر من :value حرفًا.',
        'array' => 'يجب أن تحتوي :attribute على أكثر من :value عنصرًا.',
    ],
    'gte' => [
        'numeric' => 'يجب أن تكون :attribute أكبر من أو مساويًا لـ :value.',
        'file' => 'يجب أن تكون :attribute أكبر من أو مساويًا لـ :value كيلوبايت.',
        'string' => 'يجب أن تكون :attribute أكبر من أو مساويًا لـ :value حرفًا.',
        'array' => 'يجب أن تحتوي :attribute على :value عنصرًا أو أكثر.',
    ],
    'image' => 'يجب أن تكون :attribute صورة.',
    'in' => 'العنصر المختار :attribute غير صالح.',
    'in_array' => 'حقل :attribute غير موجود في :other.',
    'integer' => 'يجب أن تكون :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن تكون :attribute عنوان IP صالحًا.',
    'ipv4' => 'يجب أن تكون :attribute عنوان IPv4 صالحًا.',
    'ipv6' => 'يجب أن تكون :attribute عنوان IPv6 صالحًا.',
    'json' => 'يجب أن تكون :attribute سلسلة JSON صالحة.',
    'lt' => [
        'numeric' => 'يجب أن تكون :attribute أقل من :value.',
        'file' => 'يجب أن تكون :attribute أقل من :value كيلوبايت.',
        'string' => 'يجب أن تكون :attribute أقل من :value حرفًا.',
        'array' => 'يجب أن تحتوي :attribute على أقل من :value عنصرًا.',
    ],
    'lte' => [
        'numeric' => 'يجب أن تكون :attribute أقل من أو مساويًا لـ :value.',
        'file' => 'يجب أن تكون :attribute أقل من أو مساويًا لـ :value كيلوبايت.',
        'string' => 'يجب أن تكون :attribute أقل من أو مساويًا لـ :value حرفًا.',
        'array' => 'يجب ألا تحتوي :attribute على أكثر من :value عنصرًا.',
    ],
    'max' => [
        'numeric' => 'قد لا تكون :attribute أكبر من :max.',
        'file' => 'قد لا تكون :attribute أكبر من :max كيلوبايت.',
        'string' => 'قد لا تكون :attribute أكبر من :max حرفًا.',
        'array' => 'قد لا تحتوي :attribute على أكثر من :max عنصرًا.',
    ],
    'mimes' => 'يجب أن تكون :attribute ملفًا من نوع: :values.',
    'mimetypes' => 'يجب أن تكون :attribute ملفًا من نوع: :values.',
    'min' => [
        'numeric' => 'يجب أن تكون :attribute على الأقل :min.',
        'file' => 'يجب أن تكون :attribute على الأقل :min كيلوبايت.',
        'string' => 'يجب أن تكون :attribute على الأقل :min حرفًا.',
        'array' => 'يجب أن تحتوي :attribute على الأقل :min عنصرًا.',
    ],
    'not_in' => 'العنصر المختار :attribute غير صالح.',
    'not_regex' => 'تنسيق :attribute غير صالح.',
    'numeric' => 'يجب أن تكون :attribute رقمًا.',
    'password' => 'كلمة المرور غير صحيحة.',
    'present' => 'يجب أن يكون حقل :attribute موجودًا.',
    'regex' => 'تنسيق :attribute غير صالح.',
    'required' => 'حقل :attribute مطلوب.',
    'required_if' => 'حقل :attribute مطلوب عندما يكون :other هو :value.',
    'required_unless' => 'حقل :attribute مطلوب ما لم يكن :other في :values.',
    'required_with' => 'حقل :attribute مطلوب عندما تكون :values موجودة.',
    'required_with_all' => 'حقل :attribute مطلوب عندما تكون :values موجودة.',
    'required_without' => 'حقل :attribute مطلوب عندما لا تكون :values موجودة.',
    'required_without_all' => 'حقل :attribute مطلوب عندما لا تكون أي من :values موجودة.',
    'same' => 'يجب أن تتطابق :attribute و :other.',
    'size' => [
        'numeric' => 'يجب أن تكون :attribute :size.',
        'file' => 'يجب أن تكون :attribute :size كيلوبايت.',
        'string' => 'يجب أن تكون :attribute :size حرفًا.',
        'array' => 'يجب أن تحتوي :attribute على :size عنصرًا.',
    ],
    'starts_with' => 'يجب أن تبدأ :attribute بواحد من الآتي: :values.',
    'string' => 'يجب أن تكون :attribute سلسلة.',
    'timezone' => 'يجب أن تكون :attribute منطقة صالحة.',
    'unique' => 'لقد تم أخذ :attribute بالفعل.',
    'uploaded' => 'فشل في تحميل :attribute.',
    'url' => 'تنسيق :attribute غير صالح.',
    'uuid' => 'يجب أن تكون :attribute UUID صالحًا.',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
