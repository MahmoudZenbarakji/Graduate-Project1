<?php

namespace App\Http\Controllers\FrontEndControllers;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index (){
        $applicants = Applicant::select(
            'applicants.*',
            'cvs.id as cv_id',
            'cvs.cv_title as cv_title',

        )
        ->leftJoin('cvs', function ($join) {
            $join->on('applicants.id', '=', 'cvs.applicant_id')
                 ->where('cvs.is_main', '=', 1);
        })

        ->with(['skills' , 'media'])
        ->get();


        //dd($applicants);
        return view('frontend.job_seekers' , [
            'applicants'=>$applicants,
        ]);
    }

    public function show ($id)
    {
        $applicant = Applicant::select(
            'applicants.*',
            'cvs.id as cv_id',
            'cvs.cv_title as cv_title',
            'users.name as user_name',
            'users.email as user_email',
            'cities.name as city_name',
            'countries.name as country_name',
            'nationalities.name as nationName',
            'salaries.range as salary_range'



        )
        ->leftJoin('users', 'applicants.user_id', '=', 'users.id')
        ->leftJoin('cities', 'users.city_id', '=', 'cities.id')
        ->leftJoin('countries', 'cities.country_id', '=', 'countries.id')
        ->leftJoin('nationalities', 'applicants.nationality_id', '=', 'nationalities.id')
        ->leftJoin('salaries', 'salaries.id', '=', 'applicants.salary_id')
        ->leftJoin('cvs', function ($join) {
            $join->on('applicants.id', '=', 'cvs.applicant_id')
                 ->where('cvs.is_main', '=', 1);
        })

        ->with(['skills' , 'media' , 'educations' , 'workExperiences' , 'job_types'])

        ->find($id);

        //dd($applicant);

        return view('frontend.job_seeker_details' , [
            'applicant'=>$applicant
        ]);
    }
}
