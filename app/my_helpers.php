<?php
/**
 * @Project:     Marcha Marlo
 * @Copyright:   Copyright (c) Danish Sheraz,
 * @Senior-Developer: Danish Sheraz
 **/

// date time helpers
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;




if (!function_exists('get_date_time')) {
    function get_date_time()
    {
        $tz_object = new DateTimeZone('Asia/Karachi');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ H:i:s');
    }
}

if (!function_exists('get_default_password')) {
    function get_default_password()
    {
        return sha1(md5('Aa123456' . 'Looper$alt'));
    }
}

if (!function_exists('get_table')) {
    function get_table($table)
    {
        if($table == 'groups'){
            return new \App\Models\Group();
        }
        else if($table == 'sessions'){
            return new \App\Models\Session();
        }
        else if($table == 'subjects'){
            return new \App\Models\Subject();
        }else{
            return null;
        }
    }
}
// date helper
if (!function_exists('get_date')) {
    function get_date()
    {
        $tz_object = new DateTimeZone('Asia/Karachi');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d');
    }
}
// date time helpers
if (!function_exists('get_time')) {
    function get_time()
    {
        $tz_object = new DateTimeZone('Asia/Karachi');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('H:i:s');
    }
}
// date time helpers
if (!function_exists('parse_datetime_get_datepicker')) {
    function parse_datetime_get_datepicker($date)
    {
        return date('Y-m-d\TH:i', strtotime($date));
    }
}
if (!function_exists('parse_date_datepicker')) {
    function parse_date_datepicker($date)
    {
        return date('m-d-Y', strtotime($date));
    }
}
if (!function_exists('parse_datetime_get')) {
    function parse_datetime_get($date)
    {
        $datetime = new DateTime($date);
        return $datetime->format('d-m-Y g:i A');
    }
}
// parse date to for db
if (!function_exists('parse_date_store')) {
    function parse_date_store($date)
    {
        return date('Y-m-d', strtotime($date));
    }
}
// parse date to for db
if (!function_exists('parse_datetime_store')) {
    function parse_datetime_store($date)
    {
        return date('Y-m-d H:i:s', strtotime($date));
    }
}
// parse date to for get
if (!function_exists('parse_date_get')) {
    function parse_date_get($date)
    {
        return date('d-m-Y', strtotime($date));
    }
}
// encrypt password
if (!function_exists('encrypt_password')) {
    function encrypt_password($password)
    {
        return sha1(md5($password . 'Looper$alt'));
    }
}
// slugify
if (!function_exists('slugify')) {
    function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, $divider);
        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
}
if (!function_exists('send_email')) {
    function send_email($email_body, $email_address, $subject)
    {
        $em = "no_reply@marchamarlo.com";
        $na = "Marcha Marlo Dev Team";
        $from = $na . "<" . $em . ">";
        $xheaders = 'MIME-Version: 1.0' . "\r\n";
        $xheaders .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $xheaders .= 'X-Priority: 1' . "\r\n";
        $xheaders .= "From: " . $from . "\r\n";
        $xheaders .= "Reply-To: " . $from . "\r\n";
        $xheaders .= "Return-Path: " . $from . "\r\n";
        $xheaders .= "Cc: danish.sheraz575@gmail.com";
        @mail($email_address, $subject, $email_body, $xheaders);

    }
}
if (!function_exists('working_days')) {
    function working_days($startDate, $endDate)
    {
        if (strtotime($endDate) >= strtotime($startDate)) {
            $holidays = array();
            $date = $startDate;
            $days = 1;
            while ($date != $endDate) {
                $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                $weekday = date("w", strtotime($date));
                if ($weekday != 6 and $weekday != 0 and !in_array($date, $holidays)) $days++;
            }
            return $days;
        } else {
            return "Please check the dates.";
        }
    }
}
if (!function_exists('total_service')) {
    function total_service($startDate, $endDate)
    {
        if (strtotime($endDate) >= strtotime($startDate)) {
            $holidays = array();
            $date = $startDate;
            $days = 0;
            while ($date != $endDate) {
                $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                $days++;
            }
            $years = floor($days / 365);
            $months = floor($days / 30);
            $days = $days - ($months*30);
            $total_service =  $years . " Years " . $months ." Months " . $days ." days";
            return $total_service;
        } else {
            return "Please check the dates.";
        }
    }
}
if (!function_exists('get_period')) {
    function get_period($startDate, $endDate)
    {
        if (strtotime($endDate) >= strtotime($startDate)) {
            $syear = date('Y', strtotime($startDate));
            $smonth = date('F', strtotime($startDate));

            $eyear = date('Y', strtotime($endDate));
            $emonth = date('F', strtotime($endDate));

            $period =  $smonth. " " . $syear . ' - '. $emonth. " " . $eyear;

            return $period;
        } else {
            return "Please check the dates.";
        }
    }
}
if (!function_exists('get_month_diff')) {
    function get_month_diff($startDate, $endDate)
    {
        if (strtotime($endDate) >= strtotime($startDate)) {
            $d1=date_create($startDate);
            $d2=date_create($endDate);
            $interval = date_diff($d1, $d2);
            $total_month = (($interval->y) * 12) + ($interval->m);
            return $total_month;
        } else {
            return "Please check the dates.";
        }
    }
}
if(!function_exists('has_permission_from_db')) {
    function has_permission_from_db($role_id, $menu_id, $permission)
    {
        $role_permission = \App\Models\RolePermission::where([
            'role_id' => $role_id,
            'menu_id' => $menu_id,
        ])->first();
        if($role_permission){
            return $role_permission->$permission;
        } else {
            return false;
        }
    }
}
if(!function_exists('has_permission')){
    function has_permission($menu_id, $permission)
    {
        foreach (Session::get('permissions') as $permission_granted){
            if($permission_granted->menu_id==$menu_id){
                return $permission_granted->$permission;
            }
        }
        return false;
    }
}
if(!function_exists('get_parent_menus')){
    function get_parent_menus($role_id)
    {
        $role_permission = \App\Models\SideMenu::with('menu_permission', 'children.menu_permission')->where([
            'status' => 1,
            'parent_id' => 0,
        ])
            ->whereHas('menu_permission', function ($query) use ($role_id)
            {
                $query->where('role_id', $role_id);
            })
            ->orderBy('sort_order', 'ASC')
            ->get();
        if($role_permission){
            return $role_permission;
        } else {
            return false;
        }
    }
}
if(!function_exists('get_child_menus')){
    function get_child_menus($parent_id)
    {
        $role_permission = \App\Models\SideMenu::with('menu_permission')->where([
            'status' => 1,
            'parent_id' => $parent_id,
        ])
            ->orderBy('sort_order', 'ASC')
            ->get();
        if($role_permission){
            return $role_permission;
        } else {
            return false;
        }
    }
}
if(!function_exists('get_route_permissions')){
    function get_route_permissions($role_id, $url)
    {
        $role_permission = DB::table('side_menus')
        ->join('role_permissions', 'side_menus.id', '=', 'role_permissions.menu_id')
        ->where('side_menus.status', '=', 1)
        ->where('side_menus.url', '=', $url)
        ->where('role_permissions.role_id', '=', $role_id)
        ->select('side_menus.*', 'role_permissions.*')
        ->first();
        if($role_permission){
            return $role_permission;
        } else {
            return false;
        }
    }
}
//Dashboard Date Function
if(!function_exists('get_date_interval')){
    function get_date_interval()
    {
        $today = get_date();
        //$today = Date('2022-01-31');
        $datetime = new DateTime($today);
        $date_today = date("d", strtotime($today));
        $hour = date("H", strtotime(get_date_time()));
        //$hour = 5;
        if($date_today == 29 && $hour < 7) {
            $from_date = date("Y-m"  ,strtotime("-1 Month" , strtotime($today)));
            $to_date = date("Y-m", strtotime($today));
            $to_date = $to_date . '-' . $date_today . ' 17:00:00';
        } else if ($date_today > 28 && $date_today <= 31) {
            $from_date = date("Y-m", strtotime($today));
            $to_date = date("Y-m-d", strtotime("+1 Day", strtotime($today))) . ' 17:00:00';
        } else {
            $from_date = date("Y-m", strtotime("-1 Month", strtotime($today)));
            $to_date = date("Y-m", strtotime($today));
            $date_today = date("d", strtotime("+1 Day", strtotime($today)));
            $to_date = $to_date . '-' . $date_today . ' 17:00:00';
        }
        if(date("m"  ,strtotime("-1 Month" , strtotime($today)))==2){
            if(DateTime::createFromFormat('Y', date("Y"  ,strtotime($today)))->format('L') === "1"){
                $from_date = $from_date . '-29 17:00:00';
            } else {
                $from_date = $from_date . '-28 17:00:00';
            }
        } else {
            $from_date = $from_date . '-29 17:00:00';
        }

        $dates = [
            'to_date' => $to_date,
            'from_date'=>  $from_date
        ];
        //dd($dates);
        return $dates;
    }
}
// Auth user time with time zone
if(!function_exists('parse_time_zone')){
    function parse_time_zone($time)
    {
        $tz_object = new DateTimeZone(Auth::user()->time_zone);
        $datetime = new DateTime($time);
        $datetime->setTimezone($tz_object);
        return $datetime->format('g:i A');
    }
}
if(!function_exists('parse_date_time_zone')){
    function parse_date_time_zone($time)
    {
        $tz_object = new DateTimeZone(Auth::user()->time_zone);
        $datetime = new DateTime($time);
        $datetime->setTimezone($tz_object);
        return $datetime->format('m-d-Y g:i A');
    }
}
if(!function_exists('parse_only_date_time_zone')){
    function parse_only_date_time_zone($time)
    {
        $tz_object = new DateTimeZone(Auth::user()->time_zone);
        $datetime = new DateTime($time);
        $datetime->setTimezone($tz_object);
        return $datetime->format('m-d-Y');
    }
}
if(!function_exists('add_notifications')){
    function add_notifications($reference_table,$type,$reference_id,$for_user_id,$message)
    {
        \App\Models\Notifications::create([
            'reference_table' => $reference_table,
            'type' => $type,
            'reference_id' => $reference_id,
            'user_id' => $for_user_id,
            'message' => $message,
        ]);
    }
}
if(!function_exists('schedule_all_employees_self_assessment')){
    function schedule_all_employees_self_assessment()
    {
        $users = \App\Models\Employee::with('employee:user_id,user_type')
            ->whereStatus(1)->select('user_id')->get()->toArray();
        foreach ($users as $user){
           // dd($user['user_id'],$user['employee']['user_type']);
            $self_assessment = false;
            // Previous appraisal record check
            $incomplete_evaluation = \App\Models\EmployeeAssessment::with('employees')
                ->where('user_id', $user['user_id'])
                ->where('hr_sign', 0)
                ->orderBy('added_on', 'desc')->first();
            $Previous_EmployeeAssessment = \App\Models\EmployeeAssessment::with('employees')
                ->where('user_id', $user['user_id'])
                ->where('hr_sign', 1)
                ->orderBy('added_on', 'desc')->first();
            if($Previous_EmployeeAssessment && !$incomplete_evaluation){
                $employee_assessment_id = $Previous_EmployeeAssessment->id;
                if(get_month_diff($Previous_EmployeeAssessment->evaluation_date, get_date()) == 3) {
                    $self_assessment = true;
                }
            }else if(!$incomplete_evaluation) {
                $employee_assessment_id = 0; //for first evaluation
                $employees = \App\Models\Employee::where('user_id', $user['user_id'])->first();
                if (get_month_diff($employees->joining_date, get_date()) >= 3) {
                    $self_assessment = true;
                }
            }
            if($self_assessment == true){
                if($user['employee']['user_type'] == 'Employee'){
                    $Notification_data = \App\Models\Notifications::where([
                        'reference_table' => 'employee_assessments',
                        'type' => 'Evaluation',
                        'reference_id' => $employee_assessment_id,
                        'user_id' => $user['user_id'],
                    ])->first();
                    if(!$incomplete_evaluation && !$Notification_data ){
                        add_notifications('employee_assessments','Evaluation',$employee_assessment_id,$user['user_id'],'Pending Self Evaluation');
                    }
                }
            }
           // return $self_assessment;
        }
    }
}
if(!function_exists('site_logs')){
    function site_logs($channel,$desc)
    {
        Log::channel($channel)->info($desc);
    }
}
if(!function_exists('get_employee_id')) {
    function get_employee_id($user_id){
        $employee = \App\Models\Employee::Where('user_id',$user_id)->get();
        if(count($employee)>0){
            $employee_id = $employee[0]->employee_id;
        }else{
            $employee_id = 0;
        }
        return $employee_id;
    }
}
if(!function_exists('get_leave_bucket_leaves')) {
    function get_leave_bucket_leaves($user_id)
    {
        $data = DB::table('leave_bucket_view')->where('user_id',$user_id)->first();
        if($data != null) {
            $remaining_annual = $data->annual_bucket - $data->annual;
            $remaining_casual = @$data->casual_bucket - (@$data->casual + @$data->other_leaves);
            if ($remaining_casual < 0) {
                $remaining_sick = @$data->sick_bucket - @$data->sick + $remaining_casual;
                $remaining_casual = 0;
            } else {
                $remaining_sick = @$data->sick_bucket - @$data->sick;
            }
        } else {
            $remaining_annual = 10;
            $remaining_casual = 4;
            $remaining_sick = 5;
        }
        return [
            'remaining_annual' => $remaining_annual,
            'remaining_casual' => $remaining_casual,
            'remaining_sick' => $remaining_sick
        ];
    }
}
if(!function_exists('check_single_employee_self_assessment_status')){
    function check_single_employee_self_assessment_status()
    {
        $self_assessment = false;
        // Incomplete  OR Previous appraisal record check
        $incomplete_evaluation = \App\Models\EmployeeAssessment::with('employees')
            ->where('user_id', Auth::user()->user_id)
            ->where('hr_sign', 0)
            ->orderBy('added_on', 'desc')->first();
        $Previous_EmployeeAssessment = \App\Models\EmployeeAssessment::with('employees')
            ->where('user_id', Auth::user()->user_id)
            ->where('hr_sign', 1)
            ->orderBy('added_on', 'desc')->first();
        if($Previous_EmployeeAssessment && !$incomplete_evaluation){
            $employee_assessment_id = $Previous_EmployeeAssessment->id;
            if(get_month_diff($Previous_EmployeeAssessment->evaluation_date, get_date()) == 3) {
                $self_assessment = true;
            }
        }else if(!$incomplete_evaluation) {
            $employee_assessment_id = 0; //for first evaluation
            if(Auth::user()->user_type == 'Employee'){
                $employees = \App\Models\Employee::where('user_id', Auth::user()->user_id)->first();
                if (get_month_diff($employees->joining_date, get_date()) >= 3) {
                    $self_assessment = true;
                }
            }
        }
        if($self_assessment == true){
            //if(Auth::user()->role_id != 1){
            if(Auth::user()->user_type == 'Employee'){
                $Notification_data = \App\Models\Notifications::where([
                    'reference_table' => 'employee_assessments',
                    'type' => 'Evaluation',
                    'reference_id' => $employee_assessment_id,
                    'user_id' => Auth::user()->user_id,
                ])->first();
                if(!$incomplete_evaluation && !$Notification_data ){
                    add_notifications('employee_assessments','Evaluation',$employee_assessment_id,Auth::user()->user_id,'Pending Self Evaluation');
                }
            }
        }
        //  return $self_assessment;
    }
}
if(!function_exists('generate_single_employee_leaves_bucket')){
    function generate_single_employee_leaves_bucket($user_id)
    {
        $leave_bucket = \App\Models\LeavesBucket::where('user_id', $user_id)->count();
        if($leave_bucket == 0 ){
            \App\Models\LeavesBucket::create(['user_id' => $user_id,
                'start_date' => get_date(),
                'annual_leaves' => 10,
                'sick_leaves' => 5,
                'casual_leaves' => 4
            ]);
        }
    }
}
if(!function_exists('update_all_employee_leaves_bucket')){
    function update_all_employee_leaves_bucket()
    {
        $users = \App\Models\Employee::with('employee:user_id,user_type')
            ->whereStatus(1)->select('user_id')->get()->toArray();
        foreach ($users as $user){
            $leave_bucket = \App\Models\LeavesBucket::where('user_id', $user['user_id'])->first();
            if($leave_bucket){
                $interval = date_diff(date_create($leave_bucket->start_date), date_create(get_date()));
                if($interval->y == 1){
                    \App\Models\LeavesBucket::where('user_id', $user['user_id'])->update(['start_date',get_date()]);
                }
            }
//        else{
//            \App\Models\LeavesBucket::create(['user_id' => $user['user_id'],
//                'start_date' => get_date(),
//                'annual_leaves' => 10,
//                'sick_leaves' => 5,
//                'casual_leaves' => 4
//            ]);
//        }
        }
    }
}

/* End of file custom_helpers.php */
/* Location: ./application/helpers/custom_helpers.php */
