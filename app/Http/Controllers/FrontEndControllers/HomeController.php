<?php

namespace App\Http\Controllers\FrontEndControllers;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Application;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $categories = Category::withCount('jobs')->get();


        $cities = City::get();

       $countries = Country::get();

       $companies = Company::with('media')->get();


        $latestJobs = Job::select(
            'jobs.*',
            'companies.company_name as companyName',
            'users.name as user_name',
            'users.email as user_email',
            'cities.name as city_name',
            'countries.name as country_name',
            'categories.name as category_name',
            'companies.id as company_id',
            'job_types.name as job_type_name',
            'salaries.range as salary_range'

        )

        ->leftJoin('categories' , 'jobs.category_id' , '=' , 'categories.id')
        ->leftJoin('companies', 'jobs.company_id', '=', 'companies.id')
        ->leftJoin('users', 'companies.user_id', '=', 'users.id')
        ->leftJoin('cities', 'users.city_id', '=', 'cities.id')
        ->leftJoin('countries', 'cities.country_id', '=', 'countries.id')
        ->leftJoin('job_types', 'job_types.id', '=', 'jobs.type_id')
        ->leftJoin('salaries', 'salaries.id', '=', 'jobs.salary_id')
        ->where('jobs.status', 'Active')
        ->orderBy('jobs.created_at', 'desc')
        ->limit(9)
        ->with(['skills', 'company.media' ])
        ->get();
        //dd($latestJobs);

        $applicants=Applicant::with('media')->get();




        return view('frontend.index' , [
        'categories'=>$categories,
        'cities'=>$cities,
        'latestJobs'=>$latestJobs,
        'applicants'=>$applicants,
        'countries'=>$countries,
        'companies'=>$companies

        ]);
    }


}
