<?php

namespace App\FamilyOperation\Modal;

use Illuminate\Http\Request;

interface OperationModal
{
    public function save(Request $request) :int;

    public function edit(Request $request);

}
