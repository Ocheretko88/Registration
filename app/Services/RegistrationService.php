<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class RegistrationService
{
    private array $users = [
        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'password' => '123456'],
        ["id" => 2, "name" => "Jane", "email" => "jane@example.com", "password" => "pass"],
    ];

    public function registerUser($firstName, $lastName, $email, $password, $confirmPassword): array
    {
        // Basic client-side validation
        if (!$firstName || !$lastName || !$email || !$password || !$confirmPassword) {
            return [
                'success' => false,
                'message' => 'All fields are required.',
            ];
        }

        // Additional client-side validation
        if (!str_contains($email, '@')) {
            return [
                'success' => false,
                'message' => 'Email must contain @.',
            ];
        }

        if ($password !== $confirmPassword) {
            return [
                'success' => false,
                'message' => 'Passwords do not match.',
            ];
        }

        // Existing user check
        foreach ($this->users as $user) {
            if ($user['email'] === $email) {
                // Log that the email already exists
                Log::info("Attempted to register an email that already exists: $email");

                return [
                    'success' => false,
                    'message' => 'Email already exists.',
                ];
            }
        }

        // Add the new user to the array
        $this->users[] = [
            'id' => count($this->users) + 1,
            'name' => $firstName . ' ' . $lastName,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ];

        // Log the updated users array
        Log::info('Updated users array: ', $this->users);

        return [
            'success' => true,
            'message' => 'Registration successful.',
        ];
    }

}
