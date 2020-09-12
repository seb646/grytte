<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Document;

class DocumentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::orderBy('created_at', 'desc')->paginate(10);
        return view('documents.index')->with('documents', $documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->hasAnyRole(['administrator', 'manager', 'contributor'])){
            return view('documents.create');
        }
        return redirect('/dashboard/documents')->with('error', 'Insufficent permissions');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $overview_data = [
            'overview_total_revenue' => (int)str_replace(',', '', $request->input('overview_total_revenue')),
            'overview_functional_expenses' => (int)str_replace(',', '', $request->input('overview_functional_expenses')),
            'overview_net_income' => (int)str_replace(',', '', $request->input('overview_net_income')),
            'overview_assets' => (int)str_replace(',', '', $request->input('overview_assets')),
            'overview_liabilities' => (int)str_replace(',', '', $request->input('overview_liabilities')),
            'overview_net_assets' => (int)str_replace(',', '', $request->input('overview_net_assets')),
        ];
        $revenue_data = [
            'revenue_tuition' => (int)str_replace(',', '', $request->input('revenue_tuition')),
            'revenue_donations' => (int)str_replace(',', '', $request->input('revenue_donations')),
            'revenue_investment_portfolio' => (int)str_replace(',', '', $request->input('revenue_investment_portfolio')),
            'revenue_fundraising' => (int)str_replace(',', '', $request->input('revenue_fundraising')),
            'revenue_government_grants' => (int)str_replace(',', '', $request->input('revenue_government_grants')),
            'revenue_application_fees' => (int)str_replace(',', '', $request->input('revenue_application_fees')),
            'revenue_other_revenue' => (int)str_replace(',', '', $request->input('revenue_other_revenue')),
        ];
        $expenses_data = [
            'expenses_employee_compensation' => (int)str_replace(',', '', $request->input('expenses_employee_compensation')),
            'expenses_catering_services' => (int)str_replace(',', '', $request->input('expenses_catering_services')),
            'expenses_textbooks' => (int)str_replace(',', '', $request->input('expenses_textbooks')),
            'expenses_financial_aid' => (int)str_replace(',', '', $request->input('expenses_financial_aid')),
            'expenses_information_technology' => (int)str_replace(',', '', $request->input('expenses_information_technology')),
            'expenses_office_expenses' => (int)str_replace(',', '', $request->input('expenses_office_expenses')),
            'expenses_legal_fees' => (int)str_replace(',', '', $request->input('expenses_legal_fees')),
            'expenses_insurance' => (int)str_replace(',', '', $request->input('expenses_insurance')),
            'expenses_other_expenses' => (int)str_replace(',', '', $request->input('expenses_other_expenses'))
        ];
        $employee_data = [
            [
                'name' => $request->input('employee_1_name'),
                'position' => $request->input('employee_1_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_1_salary'))
            ],
            [
                'name' => $request->input('employee_2_name'),
                'position' => $request->input('employee_2_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_2_salary'))
            ],
            [
                'name' => $request->input('employee_3_name'),
                'position' => $request->input('employee_3_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_3_salary'))
            ],
            [
                'name' => $request->input('employee_4_name'),
                'position' => $request->input('employee_4_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_4_salary'))
            ],
            [
                'name' => $request->input('employee_5_name'),
                'position' => $request->input('employee_5_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_5_salary'))
            ],
            [
                'name' => $request->input('employee_6_name'),
                'position' => $request->input('employee_6_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_6_salary'))
            ],
            [
                'name' => $request->input('employee_7_name'),
                'position' => $request->input('employee_7_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_7_salary'))
            ],
            [
                'name' => $request->input('employee_8_name'),
                'position' => $request->input('employee_8_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_8_salary'))
            ],
            [
                'name' => $request->input('employee_9_name'),
                'position' => $request->input('employee_9_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_9_salary'))
            ],
            [
                'name' => $request->input('employee_10_name'),
                'position' => $request->input('employee_10_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_10_salary'))
            ]
        ];
        $overview = serialize($overview_data);
        $revenue = serialize($revenue_data);
        $expenses = serialize($expenses_data);
        $employees = serialize($employee_data);

        // Create Document
        $document = new Document;
        $document->title = $request->input('document_title');
        $document->year = $request->input('document_year');
        $document->description = $request->input('document_description');
        $document->overview = $overview;
        $document->revenue = $revenue;
        $document->expenses = $expenses;
        $document->employees = $employees;
        $document->user_id = auth()->user()->id;
        // Handle file upload
        if($request->hasFile('document_file')){
            $title = strtolower($document->title);
            $replace_1 = str_replace(['(', ')'], '', $title);
            $replace_2 = str_replace('irs form', 'browning', $replace_1);
            $name = str_replace(' ', '_', $replace_2);
            $extension = $request->file('document_file')->getClientOriginalExtension();
            $file = $name.'.'.$extension;
            $path = $request->file('document_file')->storeAs('public/files/', $file);
            $document->file = $file;
        }
        $document->save();

        return redirect()->to('/documents/'.$document->id.'/edit')->with('success', 'Document Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::find($id);
        $employees_base = unserialize($document->employees);
        $employees = [];
        foreach($employees_base as $employee){
            $employees[$employee['salary']] = $employee;
        }
        krsort($employees);
        return view('documents.show')->with(['document' => $document, 'employees' => $employees]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::find($id);

        // Check for correct user
        if(Auth::user()->id == $document->user_id){
            return view('documents.edit')->with('document', $document);
        }elseif(Auth::user()->hasAnyRole(['administrator', 'manager', 'contributor'])){
            return view('documents.edit')->with('document', $document);
        }

        return redirect('/dashboard/documents')->with('error', 'Insufficent permissions');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'body' => 'required',
        //     'cover_image' => 'image|nullable|max:1999'
        // ]);

        $overview_data = [
            'overview_total_revenue' => (int)str_replace(',', '', $request->input('overview_total_revenue')),
            'overview_functional_expenses' => (int)str_replace(',', '', $request->input('overview_functional_expenses')),
            'overview_net_income' => (int)str_replace(',', '', $request->input('overview_net_income')),
            'overview_assets' => (int)str_replace(',', '', $request->input('overview_assets')),
            'overview_liabilities' => (int)str_replace(',', '', $request->input('overview_liabilities')),
            'overview_net_assets' => (int)str_replace(',', '', $request->input('overview_net_assets')),
        ];
        $revenue_data = [
            'revenue_tuition' => (int)str_replace(',', '', $request->input('revenue_tuition')),
            'revenue_donations' => (int)str_replace(',', '', $request->input('revenue_donations')),
            'revenue_investment_portfolio' => (int)str_replace(',', '', $request->input('revenue_investment_portfolio')),
            'revenue_fundraising' => (int)str_replace(',', '', $request->input('revenue_fundraising')),
            'revenue_government_grants' => (int)str_replace(',', '', $request->input('revenue_government_grants')),
            'revenue_application_fees' => (int)str_replace(',', '', $request->input('revenue_application_fees')),
            'revenue_other_revenue' => (int)str_replace(',', '', $request->input('revenue_other_revenue')),
        ];
        $expenses_data = [
            'expenses_employee_compensation' => (int)str_replace(',', '', $request->input('expenses_employee_compensation')),
            'expenses_catering_services' => (int)str_replace(',', '', $request->input('expenses_catering_services')),
            'expenses_textbooks' => (int)str_replace(',', '', $request->input('expenses_textbooks')),
            'expenses_financial_aid' => (int)str_replace(',', '', $request->input('expenses_financial_aid')),
            'expenses_information_technology' => (int)str_replace(',', '', $request->input('expenses_information_technology')),
            'expenses_office_expenses' => (int)str_replace(',', '', $request->input('expenses_office_expenses')),
            'expenses_legal_fees' => (int)str_replace(',', '', $request->input('expenses_legal_fees')),
            'expenses_insurance' => (int)str_replace(',', '', $request->input('expenses_insurance')),
            'expenses_other_expenses' => (int)str_replace(',', '', $request->input('expenses_other_expenses'))
        ];
        $employee_data = [
            [
                'name' => $request->input('employee_1_name'),
                'position' => $request->input('employee_1_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_1_salary'))
            ],
            [
                'name' => $request->input('employee_2_name'),
                'position' => $request->input('employee_2_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_2_salary'))
            ],
            [
                'name' => $request->input('employee_3_name'),
                'position' => $request->input('employee_3_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_3_salary'))
            ],
            [
                'name' => $request->input('employee_4_name'),
                'position' => $request->input('employee_4_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_4_salary'))
            ],
            [
                'name' => $request->input('employee_5_name'),
                'position' => $request->input('employee_5_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_5_salary'))
            ],
            [
                'name' => $request->input('employee_6_name'),
                'position' => $request->input('employee_6_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_6_salary'))
            ],
            [
                'name' => $request->input('employee_7_name'),
                'position' => $request->input('employee_7_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_7_salary'))
            ],
            [
                'name' => $request->input('employee_8_name'),
                'position' => $request->input('employee_8_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_8_salary'))
            ],
            [
                'name' => $request->input('employee_9_name'),
                'position' => $request->input('employee_9_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_9_salary'))
            ],
            [
                'name' => $request->input('employee_10_name'),
                'position' => $request->input('employee_10_position'),
                'salary' => (int)str_replace(',', '', $request->input('employee_10_salary'))
            ]
        ];
        $overview = serialize($overview_data);
        $revenue = serialize($revenue_data);
        $expenses = serialize($expenses_data);
        $employees = serialize($employee_data);

        // Create Document
        $document = Document::find($id);
        $document->title = $request->input('document_title');
        $document->year = $request->input('document_year');
        $document->description = $request->input('document_description');
        $document->overview = $overview;
        $document->revenue = $revenue;
        $document->expenses = $expenses;
        $document->employees = $employees;
        $document->user_id = auth()->user()->id;

        // Handle file upload
        if($request->hasFile('document_new_file')){
            $title = strtolower($document->title);
            $replace_1 = str_replace(['(', ')'], '', $title);
            $replace_2 = str_replace('irs form', 'browning', $replace_1);
            $name = str_replace(' ', '_', $replace_2);
            $extension = $request->file('document_new_file')->getClientOriginalExtension();
            $file = $name.'.'.$extension;
            $path = $request->file('document_new_file')->storeAs('public/files/', $file);
            $document->file = $file;
        }

        $document->save();

        return redirect()->to('/documents/'.$id.'/edit')->with('success', 'Document Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::find($id);

        // Check for correct user
        if(Auth::user()->id == $document->user_id){
            $document->delete();
            return redirect('/dashboard/documents')->with('success', 'Document Removed');
        }elseif(Auth::user()->hasRole(['administrator', 'manager'])){
            $document->delete();
            return redirect('/dashboard/documents')->with('success', 'Document Removed');
        }

        return redirect('/dashboard/documents')->with('error', 'Insufficent permissions');

        // Check if image is unique
        // if($document->cover_image != 'noimage.jpg'){
        //     // Delete image
        //     Storage::delete('public/documents/'.$document->cover_image);
        // }
    }
}