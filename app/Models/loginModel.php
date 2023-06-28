<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Expression;
class loginModel extends Model
{
    use HasFactory;

    function saveSignUpData($data) {
        $data = DB::table('users')->insert(
            array(
                   'name'   =>   $data['name'],
                   'email'   =>   $data['email'],
                   'password'   =>   MD5($data['name']),
            )
       );
       return $data;
    }

    function checkSignUpData($data) {
        $email = $data['email'];
        $password = MD5($data['password']);
        // $data = DB::select(DB::raw("select COUNT(users.id) from users where users.email = '" .$email. "'  AND users.password = '" .$password. "'"));
        // // $data = DB::select(DB::raw('select * from users where users.email = "' .$data['email']. '"  AND users.password = "' .$password. '"'));
        // // print_r($data);
        // return $data;   

        $data = DB::table('users')
        ->select('*')
        ->where('email', $email)
        ->where('password', $password)
        ->get();
        // print_r($data); exit;
        return $data;
    }

    function creatNewProject($projectName,$projectStart,$projectDeadline,$userId) {
        $data = DB::table('projects')->insert(
            array(
                   'project_name'     =>   $projectName, 
                   'user_id'   =>   $userId,
                   'project_created'     =>   $projectStart, 
                   'project_deadline'   =>   $projectDeadline
            )
       );
       return $data;
    }

    function getDataTable($userId) {
        $data = DB::table('projects')
        ->select('*')
        ->where('user_id', $userId)
        ->where('status', 1)
        ->get();
        // print_r($data); exit;
        return $data;
    }

    function getIdModel($id) {
        $data = DB::table('projects')
        ->select('*')
        ->where('id', $id)
        ->get();
        // print_r($data); exit;
        return $data;
    }

    function addTask($main_project_id,$task_assigned_to,$task_deadline,$task_description,$task_name) {
        $data = DB::table('task_table')->insert(
            array(
                   'project_id'     =>   $main_project_id, 
                   'task_name'   =>   $task_name,
                   'task_description'     =>   $task_description, 
                   'task_assigned_to'   =>   $task_assigned_to,
                   'task_deadline'   =>   $task_deadline
            )
       );
       return $data;
    }

    function getTaskData($project_id) {
        $data = DB::table('task_table')
        ->select('*')
        ->where('project_id', $project_id)
        ->get();
        // print_r($data); exit;
        return $data;
    }

    function deleteProject($project_id) {

       $data = DB::table('projects')
            ->where('id', $project_id)
            ->update(['status' => 0]);
        return $data;
    }

    function getTaskDetailsonId($task_id) {
        $data = DB::table('task_table')
        ->select('*')
        ->where('id', $task_id)
        ->where('status', 1)
        ->get();
        // print_r($data); exit;
        return $data;
    }

    function saveCeoInfo($user_id,$ceo_name,$ceo_company_name,$ceo_personal_phone,$ceo_personal_email,$ceo_company_email) {
        $data = DB::table('ceo_info')->insert(
            array(
                   'user_id'     =>   $user_id,
                   'ceo_name'     =>   $ceo_name, 
                   'ceo_email'   =>   $ceo_personal_email,
                   'comapny_name'     =>   $ceo_company_name, 
                   'company_email'   =>   $ceo_company_email,
                   'ceo_phone'   =>   $ceo_personal_phone
            )
       );
       return $data;
    }

    function saveCompanyInfo($user_id,$company_official_name,$company_established,$company_email,$company_telephone,$company_branch_location,$company_workers) {
        $data = DB::table('company_info')->insert(
            array(
                'user_id'   =>$user_id,
             'company_name'      => $company_official_name,
             'company_established'       => $company_established,
             'company_email'        => $company_email,
             'company_telephone'     => $company_telephone,
             'company_branch_location'     => $company_branch_location,
             'company_workers'      => $company_workers
            )
       );
       return $data;
    }

    function  getCompanyId($user_id) {
        $data = DB::table('company_info')
        ->select('*')
        ->where('user_id', $user_id)
        ->get();
        // print_r($data); exit;
        return $data;
    }
    function saveDesignationInfo($companyId,$user_id, $cc_name,$cc_phone,$cc_personal_email,$cc_password,$cc_designation_name) {
        $data = DB::table('users')->insert(
            array(
             'name'      => $cc_name,
             'email'       => $cc_personal_email,
             'password'        => $cc_password,
             'designation'     => $cc_designation_name,
            )
       );
       
       if($data == 1) {
        $data1 = DB::table('designation_info')->insert(
            array(
             'user_id'      => $user_id,
             'company_id'       => $companyId,
             'name'        => $cc_name,
             'email'     => $cc_personal_email,
             'password'        => $cc_password,
             'phone'     => $cc_phone,
            )
       );

       return $data1;
       }
    }
}
