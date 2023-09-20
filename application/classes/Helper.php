<?php


class Helper
{
    static function translit($str)
    {
        $converter = array(
            'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
            'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
            'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
            'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
            'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
            'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
            'э' => 'e',    'ю' => 'yu',   'я' => 'ya',
        );

        $value = mb_strtolower($str);
        $value = strtr($value, $converter);
        $value = preg_replace('/[^-0-9a-z]/', '-', $value);
        $value = preg_replace('/[-]+/', '-', $value);
        $value = trim($value, '-');
        return $value;
    }

    static function generatePassword($len = 8)
    {
        $chars = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
        $max = strlen($chars) - 1;
        $password = '';
        for ($i=0; $i<$len; $i++) {
            $password .= $chars[rand(0, $max)];
        }
        return $password;
    }

    static function checkRole($userId, $role)
    {
        $user = ORM::factory('User', $userId);
        $userRoles = array();
        $userRolesDbRes = $user->roles->find_all();
        foreach ($userRolesDbRes as $userRole) {
            $userRoles[] = $userRole->name;
        }
        if (in_array($role, $userRoles)) {
            return true;
        }
        else {
            return false;
        }
    }
}