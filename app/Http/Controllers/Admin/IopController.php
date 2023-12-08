<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Iop;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IopController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('iop_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.iop.index');
    }

    public function create()
    {
        abort_if(Gate::denies('iop_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.iop.create');
    }

    public function edit(Iop $iop)
    {
        abort_if(Gate::denies('iop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.iop.edit', compact('iop'));
    }

    public function show(Iop $iop)
    {
        abort_if(Gate::denies('iop_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $iop->load('country');

        return view('admin.iop.show', compact('iop'));
    }
}
