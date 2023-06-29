<?php

namespace App\Http\Controllers;

use App\Models\loginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class loginController extends Controller
{
    //
    function save_signup_details(Request $request) {
        $data = $request->input(); 
        // print_r($data);
        $model = new loginModel();
        $saveData = $model->saveSignUpData($data);
        return $saveData;
    }

    function check_login_details(Request $request) {
        $data = $request->input();
        $response = array();
        // print_r($data);exit;
        $model = new loginModel();
        $checkData = $model->checkSignUpData($data);
        // print_r($checkData); exit;
        $counts = count($checkData);
        // print_r($counts);exit;
        if($counts > 0) {
            // echo "dfssf";
            $request->session()->put('email_id',$data['email']);
            $request->session()->put('user_id',$checkData[0]->id);
            $request->session()->put('user_name', $checkData[0]->name);            
            $response['session_email'] = session('email_id');
            $response['count_rows'] = 1;
            $response['designation'] = $checkData[0]->designation;
            // print_r(session('email_id')); exit;
            // return 1;
            return $response;
        } else {
            $response['count_rows'] = 0;
            return $response;
        }
        exit;
        // return $checkData;
    }

    function view_dashboard() {
        return view('dashboard');
    }

    function view_dashboard1() {
        return view('dashboard1');
    }

    function create_new_project(Request $request) {
        $data = $request->input();
        // print_r($data);exit;
        $projectName = $data['project_name'];
        $projectStart =date('Y-m-d');
        // print_r($projectStart); exit;
        $userId = session('user_id');
        $projectDeadline = $data['project_deadline'];
        $model = new loginModel();
        $creatProject = $model->creatNewProject($projectName,$projectStart,$projectDeadline,$userId);
        return $creatProject;
    }

    function load_project_table() {
        $userId = session('user_id');
        // print_r($userId);
        $model = new loginModel();
        $getDataTable = $model->getDataTable($userId);

        $totalData = count($getDataTable);
        $totalFiltered = $totalData;
        $json_data = array(
            // "draw"            => intval( $requestData['draw'] ),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $getDataTable
        );
        echo json_encode($json_data);
    }

    function get_id_data(Request $request) {
        $data = $request->input();
        // print_r($data); exit;
        $id = $data['id'];
        $model = new loginModel();
        $getIData = $model->getIdModel($id);
        return $getIData;
    }

    function add_task(Request $request) {
        $data = $request->input();
        // print_r($data); exit;
        $main_project_id = $data['main_project_id'];
        $task_name = $data['task_name'];
        $task_description = $data['task_description'];
        $task_assigned_to = $data['task_assigned_to'];
        $task_deadline = $data['task_deadline'];
        $model = new loginModel();
        $getAddTaskData = $model->addTask($main_project_id,$task_assigned_to,$task_deadline,$task_description,$task_name);
        return $getAddTaskData;
    }

    function load_task_table(Request $request) {
        $data = $request->input();
        // print_r($data['id']); exit;
        $project_id = $data['id'];
        $model = new loginModel();
        $getTaskData = $model->getTaskData($project_id);
        // print_r($getTaskData); exit;
        $totalData = count($getTaskData);
        $totalFiltered = $totalData;
        $json_data = array(
            // "draw"            => intval( $requestData['draw'] ),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $getTaskData
        );
        echo json_encode($json_data);
    }

    function delete_project(Request $request) {
        $data = $request->input();
        // print_r($data); exit;
        $project_id = $data['project_id'];
        $model = new loginModel();
        $deleteProject = $model->deleteProject($project_id);
        return $deleteProject;
    }

    function get_task_details_on_id(Request $request) {
        $data = $request->input();
        // print_r($data); exit;
        $task_id = $data['task_id'];
        $model = new loginModel();
        $getTaskDetailsonId = $model->getTaskDetailsonId($task_id);
        return $getTaskDetailsonId;
    }

    function save_ceo_personal_infos(Request $request) {
        $data = $request->input();
        // print_r($data); exit;
        $ceo_name = $data['ceo_name'];
        $user_id = $data['user_id'] ;
        $ceo_company_name = $data['ceo_company_name'] ;
        $ceo_personal_phone = $data['ceo_personal_phone'] ;
        $ceo_personal_email = $data['ceo_personal_email'] ;
        $ceo_company_email = $data['ceo_company_email'] ;
        // $task_id = $data['task_id'];
        $model = new loginModel();
        $saveCeoInfo = $model->saveCeoInfo($user_id,$ceo_name,$ceo_company_name,$ceo_personal_phone,$ceo_personal_email,$ceo_company_email);
        return $saveCeoInfo;
    }

    function company_infos(Request $request) {
        $data = $request->input();
        // print_r($data); exit;
        $user_id= $data['user_id'];
        $company_official_name= $data['company_official_name'];
        $company_established= $data['company_established'];
        $company_email= $data['company_email'];
        $company_telephone= $data['company_telephone'];
        $company_branch_location= $data['company_branch_location'];
        $company_workers= $data['company_workers'];
        $model = new loginModel();
        $saveCompanyInfo = $model->saveCompanyInfo($user_id, $company_official_name,$company_established,$company_email,$company_telephone,$company_branch_location,$company_workers);
        return $saveCompanyInfo;
    }

    function log_out(Request $request) {
        $cc = $request->session();
        // print_r($cc); exit;
        $request->session()->flush();
        return redirect('/');
    }

    function company_designation_infos(Request $request) {
        $data = $request->input();
        $model = new loginModel();
        // print_r($data); exit;
        $user_id= $data['user_id'];
        $getCompanyId = $model->getCompanyId($user_id);
        // print_r($getCompanyId[0]->id); exit;
        $companyId = $getCompanyId[0]->id;
        $cc_name= $data['cc_name'];
        $cc_phone= $data['cc_phone'];
        $cc_personal_email= $data['cc_email'];
        $cc_password= $data['cc_password'];
        $cc_designation_name= $data['cc_designation_name'];
        $saveDesignationInfo = $model->saveDesignationInfo($companyId,$user_id, $cc_name,$cc_phone,$cc_personal_email,$cc_password,$cc_designation_name);
        return $saveDesignationInfo;
    }

    function cto_page() {
        return view('cto_page');
    }

    function ceo_information($ceo_name, $company_name) {
        // echo("Reached"); exit;
        print_r($company_name);
            print_r($ceo_name); exit;
    }

    function get_news() {

        $response = Http::get('http://newsapi.org/v2/everything?q=tesla&from=2023-05-29&sortBy=publishedAt&apiKey=8d2dd37b80b14750a622c3bf953599b2');
        $responseBody = json_decode($response->getBody(), true);

        $onlyArticles = $responseBody['articles'];
        // print_r($onlyArticles); exit;
        foreach($onlyArticles as $oneArticle) {
            $oneNewsDetails['imageUrl'] = $oneArticle['urlToImage'];
            $oneNewsDetails['name'] = $oneArticle['source']['name'];
            $oneNewsDetails['author'] = $oneArticle['author'];
            $oneNewsDetails['url'] = $oneArticle['url'];
            $oneNewsDetails['content'] = $oneArticle['content'];
            $oneNewsDetails['title'] = $oneArticle['title'];
            $allNews[] = $oneNewsDetails;
        }
        return view('showImg',array('oneNews' =>$allNews));
      
    }
}