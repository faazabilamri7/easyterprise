<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyIncomeCategoryRequest;
use App\Http\Requests\StoreIncomeCategoryRequest;
use App\Http\Requests\UpdateIncomeCategoryRequest;
use App\Models\IncomeCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class IncomeCategoryController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('income_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = IncomeCategory::query()->select(sprintf('%s.*', (new IncomeCategory())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'income_category_show';
                $editGate = 'income_category_edit';
                $deleteGate = 'income_category_delete';
                $crudRoutePart = 'income-categories';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.incomeCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('income_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.incomeCategories.create');
    }

    public function store(StoreIncomeCategoryRequest $request)
    {
        $incomeCategory = IncomeCategory::create($request->all());

        return redirect()->route('admin.income-categories.index');
    }

    public function edit(IncomeCategory $incomeCategory)
    {
        abort_if(Gate::denies('income_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.incomeCategories.edit', compact('incomeCategory'));
    }

    public function update(UpdateIncomeCategoryRequest $request, IncomeCategory $incomeCategory)
    {
        $incomeCategory->update($request->all());

        return redirect()->route('admin.income-categories.index');
    }

    public function show(IncomeCategory $incomeCategory)
    {
        abort_if(Gate::denies('income_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incomeCategory->load('incomeCategoryIncomes');

        return view('admin.incomeCategories.show', compact('incomeCategory'));
    }

    public function destroy(IncomeCategory $incomeCategory)
    {
        abort_if(Gate::denies('income_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incomeCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyIncomeCategoryRequest $request)
    {
        IncomeCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
