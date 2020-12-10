<?php
require_once 'db.php';
class company{
    private $con;
    private $company_name;
    private $username;
    private $password;
    private $siup;
    private $address;
    private $phone;
    private $email;
    private $token;
    private $aktif;
    public function __construct(){$koneksi = new database();$this->con = $koneksi->koneksi();}
    //Getters -- experimental, can be unused --
    public function getters($id, $action){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select $action from company where company_id = $id");
        while ($row = $query->fetch_assoc()){return $row[$action];}
    }
    public function register_company_first($company_name,$username,$password,$email,$token,$aktif){
        $this->company_name = $company_name;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->token = $token;
        $this->aktif = $aktif;
        $check = mysqli_query($this->con, "select * from company where email = '$email' or username = '$username'");
        $checkRow = mysqli_num_rows($check);
        if ($checkRow > 0) {return 3;} 
        elseif(mysqli_query($this->con, "insert into company (company_name,username,password,email,token,aktif) values 
            ('$company_name','$username','$password','$email','$token','$aktif')")){return 1;}
        else{return 2;}
    }
    public function register_company_second($id,$siup,$address,$phone){
        $this->siup = $siup;
        $this->address = $address;
        $this->phone = $phone;
        if (!is_numeric($phone) || strlen($phone) > 14|| strlen($phone) < 11) {return 2;} 
        elseif(mysqli_query($this->con, "update company set siup='$siup',address='$address',phone='$phone' where company_id = $id")){return 1;}
        else{return 3;}
    }
    public function viewInternshipList($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from vacancies where company_id = $id");
        return $query;
    }
    public function viewInternshipDetail($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from vacancies join company on vacancies.company_id = company.company_id where vacancies_id = $id");
        return $query;
    }
    public function viewApplication($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from application where company_id = $id");
        return $query;
    }
    public function viewProfile($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from company where company_id = $id");
        return $query;
    }
    public function OpenVacancy($company_id,$company_name,$vacancy_title,$company_address,$company_speciality,$phone,$intern_policies,$author){
        $this->company_id = $company_id;
        $this->company_name = $company_name;
        $this->vacancy_title = $vacancy_title;
        $this->company_address = $company_address;
        $this->company_speciality = $company_speciality;
        $this->phone = $phone;
        $this->intern_policies = $intern_policies;
        $this->author = $author;
        if (empty($author) || empty($intern_policies)) {
            return 0;
        } else {
            mysqli_query($this->con, "insert into vacancies (company_id,company_name,vacancy_title,company_address,company_speciality,phone,intern_policies,author) 
                            values ('$company_id','$company_name','$vacancy_title','$company_address','$company_speciality','$phone','$intern_policies','$author')"
                        );
            return 1;
        }
    }
    public function editVacancy($id,$company_id,$company_name,$company_address,$phone,$vacancy_title,$author,$company_speciality,$intern_policies){
        $id = mysqli_real_escape_string($this->con, $id);
        if($query = mysqli_query($this->con, "update vacancies set company_id='$company_id',company_name='$company_name',company_address='$company_address',phone='$phone',vacancy_title='$vacancy_title',author='$author',company_speciality='$company_speciality',intern_policies='$intern_policies' where vacancies_id = $id")){return 1;}
        else{return 2;}
    }
    public function editProfileC($id,$username,$company_name,$address,$phone){
        $id = mysqli_real_escape_string($this->con, $id);
        if (!is_numeric($phone) || strlen($phone) > 14|| strlen($phone) < 11) {return 2;}
        else{
            if($query = mysqli_query($this->con, "update company set company_name='$company_name', username='$username',address='$address',phone='$phone' where company_id = $id")){return 1;}
            else{return 3;}
        }
    }
    public function changePasswordC($id,$password){
        $id = mysqli_real_escape_string($this->con, $id);
        if($query = mysqli_query($this->con, "update company set password = '$password' where company_id = '$id'")){return 1;}
        else{return 2;}
    }
    public function ResetPassword($email,$password){
        $email = mysqli_real_escape_string($this->con, $email);
        if($query = mysqli_query($this->con, "update company set password = '$password' where email = '$email'")){return 1;}
        else{return 2;}
    }
    public function CreateRequest($req_title,$req_detail,$status){
        if($query = mysqli_query($this->con, "insert into request (req_title,req_detail,status) values ('$req_title','$req_detail','$status')")){return 1;}
        else{return 2;}
    }
    public function clickgraph($from, $to, $uid)
    {
        $graph = [];
        $data = Clicks::select(DB::raw("count('short_link_id') as count,date"))->whereBetween('date',[$from,$to])->orWhere('date','=',$to)->where('user_id','=',$uid)->get();
        $now = new \DateTime($from);
        $end = new \DateTime($to);
        $interval = new \DateInterval( 'P1D'); // 1 Day interval
        $period = new \DatePeriod( $now, $interval, $end); // 7 Days
        foreach( $period as $day) {
            $key = $day->format('M d');
            foreach($data as $value)
            {
                if(!is_null($value->date) && ($key == Carbon::createFromFormat('Y-m-d',$value->date)->format('M d')))
                {
                    $graph['count'][] = (int) $value->count;
                    $graph['date'][] = $key;
                }
                else
                {
                    $graph['count'][] = 0;
                    $graph['date'][] = $key;
                }
            }
        }
        return $graph;
    }
    

}