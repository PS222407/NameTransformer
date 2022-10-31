<?php

use Exception;

trait NameTransformer
{
    public function transformName($fullname): array
    {
        $name = trim(preg_replace('/\s+/', ' ', $fullname));
        $nameExploded = explode(' ', $name);
        try {
            $insertionPrepArr = explode(' ', explode(' ', $name, 2)[1]);
            array_pop($insertionPrepArr);
            $lastname = ucfirst(strtolower($nameExploded[count($nameExploded) -1]));
        } catch (Exception $exception) {
            $insertionPrepArr = [];
            $lastname = null;
        }

        $firstname = ucfirst(strtolower(explode(' ', $name, 2)[0]));
        $insertion = strtolower(implode(' ', $insertionPrepArr));
        $insertion = $insertion === '' ? null : $insertion;

        $fullname = $firstname;
        if ($insertion) {
            $fullname .= " $insertion";
        }
        if ($lastname) {
            $fullname .= " $lastname";
        }

        return [
            'firstname' => $firstname,
            'insertion' => $insertion,
            'lastname' => $lastname,
            'fullname' => $fullname,
        ];
    }

    public function transformUsername($username)
    {
        return trim(preg_replace('/\s+/', ' ', $username));
    }
}