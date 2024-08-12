<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\RoleEnum;
use App\Enums\MembershipLevelEnum;

class UpdateUserRequest extends FormRequest
{
    /**
     * Xác thực người dùng có quyền thực hiện yêu cầu này không.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Xác thực dữ liệu yêu cầu.
     *
     * @return array
     */
    public function rules()
    {
        $userId = $this->route('user');

        // Quy tắc chung cho các trường
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date|before:today',
            'address' => 'required|string|max:255',
            'phone' => ['required', 'string', 'max:15', 'regex:/^(\+84|84|\+0)[0-9]{9,10}$/'],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'role' => [
                'required',
                'string',
                Rule::in(RoleEnum::values())
            ],
            'membership_level' => [
                'nullable',
                'string',
                Rule::in(MembershipLevelEnum::values())
            ],
        ];

        // Quy tắc cho mật khẩu nếu có
        if ($this->has('password')) {
            $rules['password'] = [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).+$/'
            ];
        } else {
            // Nếu không có mật khẩu thì không cần password_confirmation
            $rules['password_confirmation'] = 'nullable';
        }

        return $rules;
    }

    /**
     * Thông báo lỗi xác thực.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.unique' => 'Địa chỉ email này đã được sử dụng.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'dob.before' => 'Ngày sinh phải trước hôm nay.',
            'role.in' => 'Giá trị của vai trò không hợp lệ.',
            'membership_level.in' => 'Giá trị của mức độ thành viên không hợp lệ.',
        ];
    }
}