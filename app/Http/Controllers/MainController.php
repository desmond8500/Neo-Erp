<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    /**
     * @param String $dir
     * @param File $file
     * @param Boolean $deleteFolder = false
     *
     * @return String Folder
     */

    public static function storeImage($dir, $file, $deleteFolder=false){
        if ($deleteFolder) {
            Storage::disk('public')->deleteDirectory($dir);
        }
        $name = $file->getClientOriginalName();
        $file->storeAs("public/$dir", $name);
        return "storage/$dir/$name";
    }

    public static function progression(){
        return (object) array(
            1 => 'Non Démarrée',
            2 => 'En Cours',
            3 => 'Terminée',
            4 => 'En Attente',
            5 => 'En Retard',
        );
    }

    public static function priorite(){
        return (object) array(
            1 => 'Faible',
            2 => 'Moyenne',
            3 => 'Haute',
        );
    }
}
