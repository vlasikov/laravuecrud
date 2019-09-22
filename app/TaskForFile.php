<?php

namespace App;

class TaskForFile{

    const FILE = 'tasks.txt';
    
    /**
     * create - функция записи заявки в файл
     *
     * @param mixed value - объект, массив и т.д.
     * @return string 
     *
     */
    public static function create($value){
        $val = [];
        $oldData = self::all();
        if ($oldData)
            $val = $oldData;
        $val[] = $value;

        if (self::object2file($val, self::FILE))
            return "ok";
        else 
            return "not ok";
    }

    public static function all() {
        $result = self::object_from_file(self::FILE);
        return $result;
    }

    /**
     * object2file - функция записи объекта в файл
     *
     * @param mixed value - объект, массив и т.д.
     * @param string filename - имя файла куда будет произведена запись данных
     * @return int
     */
    private static function object2file($value, $filename)
    {
        $result = false;
        $str_value = serialize($value);
        
        $f = fopen($filename, 'w');
        $result = fwrite($f, $str_value);
        fclose($f);
        return $result;
    }

    /**
     * mixed object_from_file - функция восстановления данных объекта из файла
     *
     * @param string filename - имя файла откуда будет производиться восстановление данных
     * @return mixed
     *
     */
    private static function object_from_file($filename)
    {
        $file = file_get_contents($filename);
        $value = unserialize($file);
        return $value;
    }
}