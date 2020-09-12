<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;

class PagesController extends Controller
{
    public function index(){

        $documents = Document::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.index')->with('documents', $documents);
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    public function contact(){
        return view('pages.contact');
    }

    public function credits(){
        $data = [
            'title' => 'Credits',
            'credits' => ['Fontawesome', 'TailwindUI', 'Laravel']
        ];
        return view('pages.credits')->with($data);
    }

    public function stats(){
        $documents = Document::orderBy('created_at', 'asc')->get();
        $revenue = [];
        $expenses = [];
        $income = [];
        $assets = [];
        $liabilities = [];
        $net_assets = [];
        foreach($documents as $document){
            $year = str_replace('irs form 990 (', '', str_replace(')', '', strtolower($document->title)));
            $overview = unserialize($document->overview);
            $revenue[$year] = $overview['overview_total_revenue'];
            $expenses[$year] = $overview['overview_functional_expenses'];
            $income[$year] = $overview['overview_net_income'];
            $assets[$year] = $overview['overview_assets'];
            $liabilities[$year] = $overview['overview_liabilities'];
            $net_assets[$year] = $overview['overview_net_assets'];
        }
        $data = [
            'revenue' => $revenue,
            'expenses' => $expenses,
            'income' => $income,
            'assets' => $assets,
            'liabilities' => $liabilities,
            'net_assets' => $net_assets
        ];
        return view('stats.stats')->with($data);
    }

    public function revenue(){
        $documents = Document::orderBy('created_at', 'asc')->get();
        $tuition = [];
        $donations = [];
        $investments = [];
        $fundraising = [];
        $grants = [];
        $app_fees = [];
        $other = [];
        foreach($documents as $document){
            $year = str_replace('irs form 990 (', '', str_replace(')', '', strtolower($document->title)));
            $revenue = unserialize($document->revenue);
            $tuition[$year] = $revenue['revenue_tuition'];
            $donations[$year] = $revenue['revenue_donations'];
            $investments[$year] = $revenue['revenue_investment_portfolio'];
            $fundraising[$year] = $revenue['revenue_fundraising'];
            $grants[$year] = $revenue['revenue_government_grants'];
            $app_fees[$year] = $revenue['revenue_application_fees'];
        }
        $data = [
            'tuition' => $tuition,
            'donations' => $donations,
            'investments' => $investments,
            'fundraising' => $fundraising,
            'grants' => $grants,
            'app_fees' => $app_fees
        ];
        return view('stats.revenue')->with($data);
    }

    public function expenses(){
        $documents = Document::orderBy('created_at', 'asc')->get();
        $employees = [];
        $food = [];
        $textbooks = [];
        $scholarships = [];
        $technology = [];
        $legal = [];
        foreach($documents as $document){
            $year = str_replace('irs form 990 (', '', str_replace(')', '', strtolower($document->title)));
            $expenses = unserialize($document->expenses);
            $employees[$year] = $expenses['expenses_employee_compensation'];
            $food[$year] = $expenses['expenses_catering_services'];
            $textbooks[$year] = $expenses['expenses_textbooks'];
            $scholarships[$year] = $expenses['expenses_financial_aid'];
            $technology[$year] = $expenses['expenses_information_technology'];
            $legal[$year] = $expenses['expenses_legal_fees'];
        }
        $data = [
            'employees' => $employees,
            'food' => $food,
            'textbooks' => $textbooks,
            'scholarships' => $scholarships,
            'technology' => $technology,
            'legal' => $legal
        ];
        return view('stats.expenses')->with($data);
    }

    public function employees(){
        $documents = Document::orderBy('created_at', 'asc')->get();
        $employees = [];
        foreach($documents as $document){
            $year = str_replace('irs form 990 (', '', str_replace(')', '', strtolower($document->title)));
            $employee_data = unserialize($document->employees);
            foreach($employee_data as $employee){
                $employees[$employee['name']][$year] = $employee['salary'];
            }
        }
        return view('stats.employees')->with('employees', $employees);
    }
}
