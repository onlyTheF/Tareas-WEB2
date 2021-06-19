<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxProfessorController extends Controller
{
    public function getProfessors() {
        return Professor::all();
    }

    public function getProfessor($id) {
        $professor = Professor::where('id', $id)->firstOrFail();
        return ['result' => $professor];
    }

    public function postProfessor(Request $request) {
        $professor = $request->all();
        return ['result' => Professor::create($professor)];
    }

    public function putProfessor(Request $request) {
        $professortD = $request->all();
        $professor = Professor::find($professortD['id']);
        $professor->firstName = $professortD['firstName'];
        $professor->lastName = $professortD['lastName'];
        $professor->city = $professortD['city'];
        $professor->address = $professortD['address'];
        $professor->salary  = $professortD['salary '];
        return ['result' => $professortD->save()];
    }

    public function deleteStudent($id) {
        Professor::where('id', $id)->delete();
        return ['result' => true];
    }
}
