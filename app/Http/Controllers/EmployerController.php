<?php

namespace App\Http\Controllers;
use App\Models\{Country, State, City, JobPosts};
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('employer.dashbaord');
    }

     /**
     * Show the application profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $result['countries'] = Country::get(["name", "id"]);
        $user_id = auth()->user()->id;
        if(get_user_meta($user_id, 'country') !== false){
            $result['states'] = State::where("country_id",get_user_meta($user_id, 'country'))->get(["name", "id"]);
        }   
        
        if(get_user_meta($user_id, 'state') !== false){
            $result['cities'] = City::where("state_id",get_user_meta($user_id, 'state'))->get(["name", "id"]);
        } 

        $result['user_data'] = auth()->user();
        return view('employer.profile')->with($result);
    }

    /**
     * Show the application all applicants.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function applicants()
    {
        
        $result['user_data'] = auth()->user();
        return view('employer.applicants')->with($result);
    }

    /**
     * Show the application all change password.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePassword()
    {
        
        $result['user_data'] = auth()->user();
        return view('auth.changepassword')->with($result);
    }

    /**
     * Show the application Edit Jobs.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editJob($id)
    {
        $id = (int)$id;
        $result['job_data'] = JobPosts::where('id', $id)->first();
        $result['countries'] = Country::get(["name", "id"]);
        $result['states'] = State::where("id",$result['job_data']->state)->get(["name", "id"]);
        $result['cities'] = City::where("id",$result['job_data']->city)->get(["name", "id"]);

        $result['user_data'] = auth()->user();
        
        return view('employer.editjob')->with($result);
    }

     /**
     * Show the application Post new job.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getJobs()
    {
        

        $result['user_data'] = auth()->user();
        return view('employer.jobs')->with($result);
    }

    /* Process ajax request */
    public function fetchjobs(Request $request)
    {
        $user_id =  auth()->user()->id;

        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // total number of rows per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = JobPosts::select('count(*) as allcount')->count();
        $totalRecordswithFilter = JobPosts::select('count(*) as allcount')->where('title', 'like', '%' . $searchValue . '%')->count();

        // Get records, also we have included search filter as well
        $records = JobPosts::orderBy($columnName, $columnSortOrder)
            ->where('title', 'like', '%' . $searchValue . '%')
            ->select('*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
           $edit_url = route('employer.editjob', [$record->id]);
                   
            $country = Country::where('id',$record->country)->first(["name", "id"]);
            $city = City::where('id',$record->city)->first(["name", "id"]);

            

           $action = '<div class="option-box">
           <ul class="option-list">
             <li><button  class="action-btn view-btn" data-text="View Aplication"><span class="la la-eye"></span></button></li>
             <li><a  class="action-btn edit-btn" href="'.$edit_url.'" data-text="Reject Aplication"><span class="la la-pencil"></span></a></li>
             <li><button class="action-btn delete-job-btn" data-id="'.$record->id.'" data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
           </ul>
         </div>';

            $title_content = '  <h6>'.$record->title.'</h6>
            <span class="info"><i class="icon flaticon-map-locator"></i> '.$city->name.', '.$country->name.'</span>';

            $status_content = '<div class="status">'.$record->status.'</div>';
            $applications_content = '<div class="applied"><a href="#">0 Applied</a></div>';

            $data_arr[] = array(
                "id" => $record->id,
                "title" => $title_content,
                "applications" => $applications_content,
                "status" => $status_content,
                "job_type" => getJobType($record->job_type),
                'action' => $action,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
        );

        echo json_encode($response);
    
   }

    /**
     * Show the application Post new job.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function postJob()
    {
        $result['countries'] = Country::get(["name", "id"]);      

        $result['user_data'] = auth()->user();
        return view('employer.postjob')->with($result);
    }

    public function saveJob(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'job_type' => 'required',
            'offered_salary' => 'required',
            'experience' => 'required',
            'qualification' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);


        $jobposts = JobPosts::create([
            "user_id" => $request->input('user_id'),
            "title" => $request->input('title'),
            "job_description" => $request->input('job_description'),
            "job_type" => $request->input('job_type'),
            "offered_salary" => $request->input('offered_salary'),
            "experience" => $request->input('experience'),
            "qualification" => $request->input('qualification'),
            "country" => $request->input('country'),
            "state" => $request->input('state'),
            "city" => $request->input('city'),
            "status" => 'active',
            "categories" => serialize($request->input('categories')),
        ]);

        return response()->json(array('sts' => true, 'msg' => 'Post has been created!'));
    }

    public function updateJob(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'job_type' => 'required',
            'offered_salary' => 'required',
            'experience' => 'required',
            'qualification' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);

        $jobposts = JobPosts::find($request->input('id'));
        $jobposts->title = $request->input('title');
        $jobposts->job_description = $request->input('job_description');
        $jobposts->job_type = $request->input('job_type');
        $jobposts->offered_salary = $request->input('offered_salary');
        $jobposts->experience = $request->input('experience');
        $jobposts->qualification = $request->input('qualification');
        $jobposts->country = $request->input('country');
        $jobposts->state = $request->input('state');
        $jobposts->state = $request->input('state');
        $jobposts->city = $request->input('city');
        $jobposts->categories =  serialize($request->input('categories'));

        $jobposts->save();

        return response()->json(array('sts' => true, 'msg' => 'Post has been updated!'));
    }

    public function deletejob(Request $request)
    {
       
        $job = JobPosts::find($request->input('id'));
        if($job)
        {
            if($job->delete()){
                return response()->json(array('sts' => true, 'msg' => 'Post has been deleted!'));
            }
            else{
                return response()->json(array('sts' => false, 'msg' => 'Something wrong!'));
            }   

        }
        else{
            return response()->json(array('sts' => false, 'msg' => 'Job not found!'));
        }
    }
}
