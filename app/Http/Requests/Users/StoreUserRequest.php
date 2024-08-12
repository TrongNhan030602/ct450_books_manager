<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RoleEnum;
use App\Enums\MembershipLevelEnum;

class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^(\+84|84|\+0)[0-9]{9,10}$/'],
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).+$/'],
            'role' => ['required', 'string', function($attribute, $value, $fail) {
                $validRoles = RoleEnum::values();
                
                if (!in_array($value, $validRoles)) {
                    $fail('The selected ' . $attribute . ' is invalid.');
                }
            }],
            'membership_level' => ['required', 'string', function($attribute, $value, $fail) {
                $validLevels = MembershipLevelEnum::values();
                
                if (!in_array($value, $validLevels)) {
                    $fail('The selected ' . $attribute . ' is invalid.');
                }
            }],
        ];
    }

    public function messages(): array
    {
        return [
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ cái viết hoa, một chữ cái viết thường, và một ký tự đặc biệt.',
            'role.required' => 'Vai trò là bắt buộc.',
            'role.string' => 'Vai trò phải là một chuỗi.',
            'membership_level.required' => 'Mức độ thành viên là bắt buộc.',
            'membership_level.string' => 'Mức độ thành viên phải là một chuỗi.',
        ];
    }
}