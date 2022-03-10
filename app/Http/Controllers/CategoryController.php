<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;
use App\Models\Category;

class CategoryController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming create category request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('admin.category.index');
    }

     /* Process ajax request */
     public function fetchCategories(Request $request)
     {
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
         $totalRecords = Category::select('count(*) as allcount')->count();
         $totalRecordswithFilter = Category::select('count(*) as allcount')->where('title', 'like', '%' . $searchValue . '%')->count();
 
         // Get records, also we have included search filter as well
         $records = Category::orderBy($columnName, $columnSortOrder)
             ->where('title', 'like', '%' . $searchValue . '%')
             ->select('*')
             ->skip($start)
             ->take($rowperpage)
             ->get();
 
         $data_arr = array();
 
         foreach ($records as $record) {
            $edit_url = route('admin.editcategory', [$record->id]);
            $action = '<a class="action-btn edit-btn" href="'.$edit_url.'"><i class="fas fa-pencil-alt"></i></a>';
            $action .= '<a class="action-btn delete-btn" data-id="'.$record->id.'" href="javascript:void(0);"><i class=" fas fa-trash-alt "></i></a>';

             $data_arr[] = array(
                 "id" => $record->id,
                 "title" => $record->title,
                 "slug" => $record->slug,
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

    protected function addCategory(array $data)
    {
        dd($data);
        $result = Category::create([
            'title' => $data['name'],
            'slug' => $data['name'],
            'content' => $data['description'],
        ]);

        
    }
 
}
