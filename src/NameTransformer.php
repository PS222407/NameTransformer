<?php

trait NameTransformer
{
    public function transformName($fullname): Person
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

        return new Person($firstname, $insertion, $lastname);
    }

    public function transformUsername($username): string
    {
        return trim(preg_replace('/\s+/', ' ', $username));
    }
}
