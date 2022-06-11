<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyFaqQuestionRequest;
use App\Http\Requests\StoreFaqQuestionRequest;
use App\Http\Requests\UpdateFaqQuestionRequest;
use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FaqQuestionController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('faq_question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = FaqQuestion::with(['category'])->select(sprintf('%s.*', (new FaqQuestion())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'faq_question_show';
                $editGate = 'faq_question_edit';
                $deleteGate = 'faq_question_delete';
                $crudRoutePart = 'faq-questions';

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
            $table->addColumn('category_category', function ($row) {
                return $row->category ? $row->category->category : '';
            });

            $table->editColumn('question', function ($row) {
                return $row->question ? $row->question : '';
            });
            $table->editColumn('answer', function ($row) {
                return $row->answer ? $row->answer : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'category']);

            return $table->make(true);
        }

        return view('admin.faqQuestions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('faq_question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = FaqCategory::pluck('category', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.faqQuestions.create', compact('categories'));
    }

    public function store(StoreFaqQuestionRequest $request)
    {
        $faqQuestion = FaqQuestion::create($request->all());

        return redirect()->route('admin.faq-questions.index');
    }

    public function edit(FaqQuestion $faqQuestion)
    {
        abort_if(Gate::denies('faq_question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = FaqCategory::pluck('category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $faqQuestion->load('category');

        return view('admin.faqQuestions.edit', compact('categories', 'faqQuestion'));
    }

    public function update(UpdateFaqQuestionRequest $request, FaqQuestion $faqQuestion)
    {
        $faqQuestion->update($request->all());

        return redirect()->route('admin.faq-questions.index');
    }

    public function show(FaqQuestion $faqQuestion)
    {
        abort_if(Gate::denies('faq_question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faqQuestion->load('category');

        return view('admin.faqQuestions.show', compact('faqQuestion'));
    }

    public function destroy(FaqQuestion $faqQuestion)
    {
        abort_if(Gate::denies('faq_question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faqQuestion->delete();

        return back();
    }

    public function massDestroy(MassDestroyFaqQuestionRequest $request)
    {
        FaqQuestion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
