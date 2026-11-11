<?php

namespace App\Core;

class Session {

    public static function start(): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set(string $key, mixed $value): void {
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, mixed $default = null): mixed {
        self::start();
        return $_SESSION[$key] ?? $default;
    }

    public static function destroy(): void {
        self::start();
        session_destroy();
        $_SESSION = [];
    }

    // --- Métodos de Verificación de Roles y Autenticación ---

    public static function isLoggedIn(): bool {
        self::start();
        return self::get('user_id') !== null;
    }

    public static function isAdmin(): bool {
        self::start();
        return self::get('user_role') === 'admin';
    }
}