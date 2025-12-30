<?php

namespace Utils;

use InvalidArgumentException;

class Validate
{
    public static function existence($body, $required): array
    {
        $values = [];

        foreach ($required as $field) {
            if (!array_key_exists($field, $body) || $body[$field] === null || $body[$field] === '') {
                throw new InvalidArgumentException("Campo obrigatório ausente ou vazio: {$field}");
            }

            $values[] = $body[$field];
        }

        return $values;
    }
}
