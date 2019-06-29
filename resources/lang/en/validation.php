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
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                =>':attribute ให้เป็นตัวอักษรเท่านั้น ห้ามเป็นตัวเลขหรืออักขระพิเศษ',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => ':attribute ห้ามมีอักขระพิเศษ',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => ':attribute ไม่ถูกต้อง',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'รูปแบบของอีเมล์ไม่ถูกต้อง',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'กรุณาใส่ไฟล์ :attribute ',
    'filled'               => 'The :attribute field must have a value.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => ':attribute ต้องไม่เกิน :max ตัว',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => ':attribute ต้องไม่เกิน :max ตัวอักษร',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => ':attribute ต้องมีอย่างน้อย :min ตัว',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => ':attribute ต้องเป็นตัวเลขเท่านั้น',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'โปรดระบุ :attribute ',
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
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
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
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
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
      'number' => 'เลขห้อง',
      'amount' => 'ผลรวม',
      'description' => 'รายละเอียด',
      'typeroom' => 'ประเภทห้องเรียน',
      'selecttype' => 'ประเภทห้องเรียน',
      'nameGrade' => 'ชื่อประเภทเรียน',
      'idtype' => 'ประเภท',
      'group' => 'กลุ่ม',
      'Topics' => 'หัวเรื่อง',
      'Content' => 'เนื้อหา',
      'pic' => 'รูปภาพ',
        'Pic' => 'รูปภาพ',
      'username' => 'ชื่อผู้ใช้',
      'password' => 'รหัสผ่าน',
      'firstname' => 'ชื่อ',
      'lastname' => 'นามสกุล',
      'firstName' => 'ชื่อ',
      'lastName' => 'นามสกุล',
      'sex' => 'เพศ',
      'age' => 'อายุ',
      'email' => 'อีเมล์',
      'phone' => 'เบอร์โทรศัพท์',
      'address' => 'ที่อยู่',
      'idcard' => 'เลขประจำตัวบัตรประชาชน',
      'position' => 'ตำแหน่ง',
      'ability' => 'ความสามารถ',
      'Resume' => 'ประวัติการสมัคร',
      'IDCardPhoto' => 'สำเนาบัตรประชาชน',
      'nametype' => 'ชื่อประเภท',
          'comment' => 'ความคิดเห็น',
          'subject0' => 'วิชา',
          'checksub' => 'วิชา',
          'Identification_no' => 'เลขรหัสประจำตัว',
          'interested_position' => 'ตำแหน่งที่สนใจ',

    ],

];
