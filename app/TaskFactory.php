<?php

namespace App;

use App\Task;
use App\TaskForFile;
use Illuminate\Http\Request;

class TaskFactory {
    /**
     * getModel - функция возвращает нужную модель
     *
     * @param request request - объект
     * @return modelTask
     */
    public static function getModel($space){

        switch ($space) {
            case 'db':
                $modelTask = "App\Task";
                break;
            case 'file':
                $modelTask = "App\TaskForFile";
                break;
            
            default:
                # code...
                break;
        }

        return $modelTask;
    }
}