<?php

class Validator {
    public static function validate(array $rules, array $data): array {
        $errors = [];

        foreach ($rules as $field => $ruleSet) {
            $value = $data[$field] ?? null;
            foreach (explode('|', $ruleSet) as $rule) {
                if ($rule === 'required' && is_null($value)) {
                    $errors[$field][] = 'Este campo es obligatorio';
                }
                if ($rule === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errors[$field][] = 'Formato de email inválido';
                }
            }
        }

        return $errors;
    }
}
