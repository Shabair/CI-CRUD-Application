<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function server_processing($data, $sql_details, $table, $primaryKey, $columns, $whereResult, $whereAll=null) {
   

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * If you just want to use the basic configuration for DataTables with PHP
     * server-side, there is no need to edit below this line.
     */

    require( 'ssp.class.php' );

    echo json_encode(
        SSP::complex( $data, $sql_details, $table, $primaryKey, $columns, $whereResult, $whereAll=null )
    );
}



function getState($value){
    $states = [
                    'AB'    =>  'Alberta',
                    'BC'    =>  'British',
                    'MB'    =>  'Manitoba',
                    'NB'    =>  'New',
                    'NL'    =>  'Newfoundland',
                    'NT'    =>  'Northwest',
                    'NS'    =>  'Nova',
                    'NU'    =>  'Nunavut',
                    'ON'    =>  'Ontario',
                    'PE'    =>  'Prince',
                    'QC'    =>  'Quebec',
                    'SK'    =>  'Saskatchewan',
                    'YT'    =>  'Yukon'
    ];
    return (isset($states[$value]))?$states[$value]:null;
}
function getUSState($value){
    $states = [
                    'AL'    =>  'Alabama',
                    'AK'    =>  'Alaska',
                    'AZ'    =>  'Arizona',
                    'AR'    =>  'Arkansas',
                    'CA'    =>  'California',
                    'CO'    =>  'Colorado',
                    'CT'    =>  'Connecticut',
                    'DE'    =>  'Delaware',
                    'FL'    =>  'Florida',
                    'GA'    =>  'Georgia',
                    'HI'    =>  'Hawaii',
                    'ID'    =>  'Idaho',
                    'IL'    =>  'Illinois',
                    'IN'    =>  'Indiana',
                    'IA'    =>  'Iowa',
                    'KS'    =>  'Kansas',
                    'KY'    =>  'Kentucky',
                    'LA'    =>  'Louisiana',
                    'ME'    =>  'Maine',
                    'MD'    =>  'Maryland',
                    'MA'    =>  'Massachusetts',
                    'MI'    =>  'Michigan',
                    'MN'    =>  'Minnesota',
                    'MS'    =>  'Mississippi',
                    'MO'    =>  'Missouri',
                    'MT'    =>  'Montana',
                    'NE'    =>  'Nebraska',
                    'NV'    =>  'Nevada',
                    'NH'    =>  'New Hampshire',
                    'NJ'    =>  'New Jersey',
                    'NM'    =>  'New Mexico',
                    'NY'    =>  'New York',
                    'NC'    =>  'North Carolina',
                    'ND'    =>  'North Dakota',
                    'OH'    =>  'Ohio',
                    'OK'    =>  'Oklahoma',
                    'OR'    =>  'Oregon',
                    'PA'    =>  'Pennsylvania',
                    'RI'    =>  'Rhode Island',
                    'SC'    =>  'South Carolina',
                    'SD'    =>  'South Dakota',
                    'TN'    =>  'Tennessee',
                    'TX'    =>  'Texas',
                    'UT'    =>  'Utah',
                    'VT'    =>  'Vermont',
                    'VA'    =>  'Virginia',
                    'WA'    =>  'Washington',
                    'WV'    =>  'West Virginia',
                    'WI'    =>  'Wisconsin',
                    'WY'    =>  'Wyoming'
    ];
    return (isset($states[$value]))?$states[$value]:null;
}

    function getposition($value){
        $positions = [
                        'local'    =>  'City Driver',
                        'long_haul'    =>  'long Haul',
                        'owner_operator'    =>  'Owner Operator',
                        'driver_of_owner'   => 'Driver Of Owner Operator'
        ];
        return (isset($positions[$value]))?$positions[$value]:null;
    }



    function taginput_date($data){
        if($data == null  || empty($data))
            return null;

        $remarks = explode(',',$data);
        for($i = 0;$i <count($remarks);$i++){
            if(strpos($remarks[$i], '(')!==false && strpos($remarks[$i], ')')!==false && strpos($remarks[$i], '/')!==false){
                $temp = explode(')',$remarks[$i],2);
                $re[$i] = [$temp[0].')',$temp[1]];
            }else{
                $re[$i] = ['('.date("M/d/Y").')',$remarks[$i]];
            }
        }
        return serialize($re);

    }

    function get_date_taginput($data){
        if($data == null || empty($data))
            return null;

        $arr=unserialize($data);
        for ($i=0; $i < count($arr); $i++) { 
            $str[] = $arr[$i][0].' '.trim($arr[$i][1]);
        }
        $remarks = implode(',', $str);

        return $remarks;
    }

    function get_table_remarks($data){
        if($data == null || empty($data))
        return null;

        $arr=unserialize($data);

        
        $lastdata = $arr[count($arr)-1][1];
        // $remarks = implode(',', $str);
        $remarks = substr($lastdata, 0,20).((strlen($lastdata) > 20)?'...':null);

        return $remarks;
    }


    function remove_duplicated_values($array1,$array2){
        $newArray = array();
        $is_in = false;
        foreach ($array1 as $key1 => $value1) {
            foreach ($array2 as $key2 => $value2) {
                if($value1 == $value2){
                    $is_in = true;
                }
            }
            if(!$is_in){
                $newArray[] = $value1;
            }
            $is_in = false;
        }
        return $newArray;
    }
    function getDriverFullName($id){
        $CI = &get_instance();
        // $result = $CI->db->query("CALL GetDriverName(".$id.");")->row_array();
        $result = $CI->db->query("SELECT CONCAT_WS(' ',`first_name`,`middle_name`,`last_name`) as Name FROM drivers where id  = ?;",[$id])->row_array();
        return $result['Name'];
    }

    function getTruckUnit($id){
        $CI = &get_instance();
        $result = $CI->db->query("SELECT unit_no From `truck` WHERE id='".$id."'");
        return ($result->num_rows()> 0)?$result->row()->unit_no:null;
    }

    function getTrailerUnit($id){
        $CI = &get_instance();
        $result = $CI->db->query("SELECT unit_no From `trailer` WHERE id='".$id."'");
        return ($result->num_rows()> 0)?$result->row()->unit_no:null;
    }




    function url_generator($URLlength = 7){
        $charray = array_merge(range('A','Z'), range('0','9'));
        $max = count($charray) - 1;
        $url = null;
        for ($i = 0; $i < $URLlength; $i++) {
            $randomChar = mt_rand(0, $max);
            $url .= $charray[$randomChar];
        }

        return $url;
    }



    function get_user_email_by_id($id){
        $CI = &get_instance();
        $sql = "SELECT email FROM `users` WHERE id = ?";
        $result = $CI->db->query($sql,array($id));
        return $result->row()->email;
    }

    function get_username_by_id($id){
        $CI = &get_instance();
        $sql = "SELECT username FROM `users` WHERE id = ?";
        $result = $CI->db->query($sql,array($id));
        return $result->row()->username;
    }



    function history($data){
        $CI =&get_instance();
        $CI->db->insert('history',$data); 
        if($CI->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }



    // function get_from($table,$column,$where = null,$notSingle = false){
    //     $CI=&get_instance();
    //     $result = $CI->db->select($column)->where($where)->get($table);
    //     return (($result->num_rows() > 0 )?
    //         (($notSingle)?$result-> result_array():$result-> row()->$column) 
    //         : false);
    // }

    // function get_from($table,$column,$where=[]){
    //     $CI=&get_instance();
    //     $result = $CI->db->select($column)->where($where)->get($table);
    //     return (($result->num_rows() > 0 )?
    //         (($result->num_rows()==1)?(count((array)$result->row())>1? $result->row():$result->row()->$column) :$result-> result_array()) 
    //         : false);
    // }

    function get_from($table,$column="*",$where=[]){
        $CI=&get_instance();
        if($column != '*'){
            $result = $CI->db->select($column)
                        ->where($where)
                        ->get($table);
            return (($result->num_rows() > 0 )?
                        (($result->num_rows()==1)?
                            (count((array)$result->row())>1? 
                                $result->row_array():$result->row()->$column) 
                            :$result-> result_array()) 
                        : null);
        }else if($column == '*'){

            $result = $CI->db->select($table.'.'.$column)->where($where)->get($table);
            return (($result->num_rows() > 0 )?
                (($result->num_rows()==1)?(count((array)$result->row())>1? $result->row_array():$result->row()->$column) :$result-> result_array()) 
                : null);
        }
        
    }

    function meta_data($table,$column,$tbl_item_id,$value=null){
        $CI=&get_instance();

        if(empty($value)){
            $returnData = $CI->db->select('tbl_val')
                            ->where('tbl_name',$table)
                            ->where('tbl_col',$column)
                            ->where('tbl_item_id',$tbl_item_id)
                            ->get('extra_data')->row();
            if(count($returnData)){
                return $returnData->tbl_val;
            }else{
                return null;
            }

        }else if($value!==null){
            // die('aasxaxs');
            $data = [
                'tbl_val'=>$value
            ];

            $CI->db->where('tbl_name', $table);
            $CI->db->where('tbl_col', $column);
            $CI->db->where('tbl_item_id', $tbl_item_id);
            $CI->db->update('extra_data', $data);
            if(!$CI->db->affected_rows()){
                $data = array(
                        'tbl_item_id' => $tbl_item_id,
                        'tbl_name' => $table,
                        'tbl_col' => $column,
                        'tbl_val' => $value,
                );

                $CI->db->insert('extra_data', $data);
            }

        }

    }

/*
$returnData = $CI->db->select('tbl_val')
                            ->where('tbl_name',$table)
                            ->where('tbl_col',$column)
                            ->where('tbl_item_id',$tbl_item_id)
                            ->get('extra_data')->row();

*/
    function extra_data($where,$value=null){
        $CI=&get_instance();

            // die('aasxaxs');
            // $data = [
            //     'tbl_val'=>$value
            // ];

            // $CI->db->where($where);
            // $CI->db->update('extra_data', $data);
            // if(!$CI->db->affected_rows()){
            //     $data = array(
            //             'tbl_item_id' => $where['tbl_item_id'],
            //             'tbl_name' => $where['tbl_name'],
            //             'tbl_col' => $where['tbl_col'],
            //             'tbl_val' => $value,
            //     );

            //     $CI->db->insert('extra_data', $data);
            // }
            $CI->db->query("INSERT INTO extra_data (id,tbl_item_id,tbl_name,tbl_col,tbl_val) VALUES 
                ('".$where['id']."','".$where['tbl_item_id']."','".$where['tbl_name']."','".$where['tbl_col']."','".$where['tbl_val']."') 
                ON DUPLICATE KEY UPDATE tbl_val='".$where['tbl_val']."',tbl_col='".$where['tbl_col']."'");

    

    }

    function get_rec_meta_data($data){
        $CI =&get_instance();

        $CI->db->select('tbl_val')
                ->from('extra_data')
                ->where($data)
                ->order_by('id','desc')
                ->limit(1);

        $result = $CI->db->get();
        if($result->num_rows() > 0){
            return $result->row()->tbl_val;
        }else{
            return null;
        }
    }

    function create_action_token($user_id,$action_on,$action,$rand){
        $CI =&get_instance();

        $dateTime = date("Y-m-d H:i:s");

        $data = [
            'user_id'       => $user_id ,
            'action_on'     => $action_on ,
            'action'        => $action ,
            'rand'          => $rand ,
            'date'          => $dateTime ,

        ];

        $CI->db->insert('action_tokens',$data);

        $CI->load->library('encrypt');
        // $text = $user_id.'::'.$action_on.'::'.$action.'::'.$rand.'::'.$dateTime;
        $text = serialize($data);
        return $CI->encrypt->encode($text);
    }

    function check_action_token($cipher){

        $CI =&get_instance();
        // $cipher = $CI->input->post_get($index);

        if(!empty($cipher)){
            $CI->load->library('encrypt');
            $data = @unserialize($CI->encrypt->decode($cipher));
            $result = $CI->db->select('action,action_on,id')->where('user_id',$CI->get_user_id())->where('rand',$data['rand'])->where('date',$data['date'])
                    ->get('action_tokens');
            if($result->num_rows() > 0){
                $data = $result->row();
                // action token work one time
                $CI->db->where('id',$data->id);
                $CI->db->delete('action_tokens');

                return $data;
            }
        }

        return null;

    }    

    function delete_action_token($cipher){
        $CI =&get_instance();
        $CI->load->library('encrypt');
        $data = @unserialize($CI->encrypt->decode($cipher));

        $CI->session->unset_userdata('action_token');
        $CI->db->where('user_id',$CI->get_user_id())->where('rand',$data['rand'])->where('date',$data['date']);
        return $CI->db->delete('action_tokens');

    }


    function get_date_style($date){
        if($date){
            return date("m/d/Y",strtotime($date));
        }else{
            return null;
        }
    }

    function setDateInDB($date = null,$incommingFormat = 'd/M/Y',$returnformat = 'Y-m-d'){
        // 15-Feb-2009 => d-M-Y
        // if(!empty($date)){
        //     return DateTime::createFromFormat('d-M-Y', $date)->format($returnformat);
        // }else{
        //     return $date;
        // }

        $returnDate = DateTime::createFromFormat($incommingFormat, $date);
        if($returnDate){
            return $returnDate->format($returnformat);
        }else{
            
            return $date;
        }
    }

    function getDateFromDB($date = null,$returnformat = 'd/M/Y'){

        $returnDate = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        if($returnDate){
            return $returnDate->format($returnformat);
        }else{
            return $date;
        }

    }

    function redirect_404($page = '404/default',$title = '404',$data = null){
        $CI =&get_instance();
        $CI->_viewData['view'] = $page;
        // $CI->_viewData['page'] = 0;
        $CI->_viewData['title'] = $title;
        $CI->_render($CI->_viewData);
    }


    function get_block($name,$excerpt = false){
        $CI =&get_instance();
        
        $CI->db->select('excerpt,content');

        $CI->db->where('name',$name);
        
        $CI->db->order_by('id','desc');
        $CI->db->limit(1);
        $result = $CI->db->get('block')->row_array();

        if($excerpt){
            return parser_words($result['excerpt']);
        }else{
            return parser_words((empty($result['excerpt']))?$result['content']:$result['excerpt']);
        }
    }


function SetSEO($data){
    $CI =&get_instance();
    $CI->db->insert('seo_data',$data);
}
function UpdateSEO($table,$item_id,$data){
    $CI =&get_instance();
    $CI->db->set($data);
    $CI->db->where('item_id',$item_id);
    $CI->db->where('table',$table);
    $CI->db->update('seo_data');
    if(!$CI->db->affected_rows()){
        $SEO['item_id'] = $item_id;
        $SEO['table'] = $table;
        $SEO = array_merge($SEO,$data);
        SetSEO($SEO);
    }
}

function GetSEO($table,$item_id,$select='*'){
    $CI =&get_instance();
    $CI->db->select($select);
    $CI->db->where('table',$table);
    $CI->db->where('item_id',$item_id);
    return $CI->db->get('seo_data')->row_array();
}

function addFormMakerData($data){
    $CI =&get_instance();
    $CI->db->insert('form_maker',$data);
}


function SetFormMakerData($data){
    $CI =&get_instance();

    $sql = "INSERT INTO form_maker (`table`,item_id,all_fields,html_fields) VALUES 
                ('".$data['table']."','".$data['item_id']."','".$data['all_fields']."','".$data['html_fields']."') 
                ON DUPLICATE KEY UPDATE all_fields='".$data['all_fields']."',html_fields='".$data['html_fields']."'";

    $CI->db->query($sql);
}



function getIdFromSlug($table,$slug){
    $CI=&get_instance();
    $result = $CI->db->select('id')->from($table)->where('id',$slug)->or_where('slug',$slug)->get();
    return ($result->num_rows())?$result->row()->id:null;
}


function nextAndPrevious($table,$slug,$more_where = ''){
    $CI=&get_instance();
    $id = getIdFromSlug($table,$slug);
    if($id){
        $next = "select * from ".$table." where id = (select min(id) from ".$table." where id > ".$id." AND published = '1' AND active = '1' ".$more_where.")";
        $previous = "select * from ".$table." where id = (select max(id) from ".$table." where id < ".$id."  AND published = '1' AND active = '1' ".$more_where.")";
        $data['nextItem'] = $CI->db->query($next)->row_array();
        $data['previousItem'] = $CI->db->query($previous)->row_array();
    }else{
        $data = $id;
    }
    return $data;
}

function array_remove(array &$arr, $key) {
    if (array_key_exists($key, $arr)) {
        $val = $arr[$key];
        unset($arr[$key]);

        return $val;
    }

    return null;
}

function field_error($field){
    return form_error($field, '<div class="f-error">(', ')</div>');
}

function uploads_path($item = ''){
    $CI=&get_instance();
    return $CI->_baseUrl.$CI->_uploadPath.$item;
}


function share(){

    echo '<div class="entry-meta mb-10">
              <ul>
                <li style="float: right;">
                    <ul id="share-buttons">
                      
                    </ul>
                </li>
              </ul>
            </div>';
}

function thmb_size_lbl($width = 870 ,$height = 400){
    echo '<span class="tmbnl-img-sz-lbl"> ('.$width.' X '.$height.')</span>';
}

function limit_text($text = '',$limit = 250,$start=0,$style="..."){
 return mb_strimwidth($text, $start, $limit, $style);
}

function excerpt($excerpt){
    return limit_text($excerpt);
}



function thumbnail_generator($imgSrc,$width,$height){
                    
    $CI = &get_instance();

    // get src file's dirname, filename and extension
    $path = pathinfo($imgSrc);

    // Path to image thumbnail
    // if( !$saveDirec )
    //     $saveDirec = $path['dirname'] . '/' . $path['filename'] . "_" . $width . '_' . $height . "." . $path['extension'];

    $saveDirec = config_item('thumbnail_folder'). '/' .$width.'x'.$height. '/' ;

    $new_thumb = $saveDirec.$path['filename'] . "." . $path['extension'];

    //check if already file exists
    if(!file_exists($new_thumb)){

        // if Directory not exsits then create it.
        if (!is_dir($saveDirec)) {
            mkdir($saveDirec, 0777, TRUE);
        }
        
        //load the image library which will be used by the codeigniter for image processing 
        $config['image_library'] = 'gd2';

        //setting up the source of image
        $config['source_image'] = $imgSrc;

        //get the all attributes of original image
        list($original_width, $original_height, $file_type, $attr) = getimagesize($config['source_image']);

        //this path for the new image otherwise overwrite the original image.
        $config['new_image'] = $saveDirec;

        //division of original image width by required width 
        $widthRatio = ($original_width/$width);

        //division of original image height by required height
        $heightRatio = ($original_height/$height);

        //then compare which one is lesser
        if($widthRatio < $heightRatio){

            $multiplyRatio = $widthRatio;

        }else{

            $multiplyRatio = $heightRatio;

        }

        //multiply the lesser value with the required both width and height
        $widthFinal = $width*$multiplyRatio;

        $heightFinal = $height*$multiplyRatio;


        $config['width']         = floor($widthFinal);

        $config['height']       = floor($heightFinal);

        $config['maintain_ratio'] = false;

        // set our cropping limits according to the center of image.
        $x_axis = ($original_width / 2) - ($widthFinal / 2);

        $y_axis = ($original_height / 2) - ($heightFinal / 2);

        // $x_axis = ($original_width - $width)/2;

        // $y_axis = ($original_height - $height)/2;

        $config['x_axis'] = $x_axis;
        $config['y_axis'] = $y_axis;

        $CI->load->library('image_lib');
        $CI->image_lib->initialize($config); 

        if ( ! $CI->image_lib->crop())
        {
              echo $CI->image_lib->display_errors();die();
        }
        $CI->image_lib->clear();

        //again get the image for the next process of resizing
        $config['source_image'] = $new_thumb;

        $config['new_image'] = $saveDirec;
        $config['width']         = $width;
        $config['height']       = $height;
        $config['maintain_ratio'] = true;

        // $config['y_axis'] = 50;

        $CI->load->library('image_lib');

        $CI->image_lib->initialize($config); 

        if ( ! $CI->image_lib->resize())
        {
              echo $CI->image_lib->display_errors();die();
        }

        $CI->image_lib->clear();
    }
}

function get_thumbnail($imgSrc,$width,$height){
    $thumbDirec = config_item('thumbnail_folder'). '/' .$width.'x'.$height. '/' ;
    return base_url($thumbDirec.$imgSrc);
}

function seo_html(){
echo ' <section class="light_section">
            <div class="col-lg-12">
                <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true" style="background-color: #585353;">
                    <div class="panel panel-default" style="margin-bottom: 5px;background-color: #585353;">
                        <div class="panel-heading" role="tab" id="headingOne" data-collapse="asd" style="padding: 0 15px;background-color: #585353;">
                            <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#seo-panel" aria-expanded="true" aria-controls="collapse">
                     
                      <h4 style="color: #ffffff;">SEO
                      <div class="pull-right ">
                        <i class="glyphicon glyphicon-plus sign_of_expand" ></i>
                      </div>
                      </h4>
                            </a>
                            </h4>
                        </div>
                        <div id="seo-panel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="background-color: #fff;">
                            <div class="panel-body">

                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label for="seo_keywords" class="control-label">SEO Keywords</label>
                                        <input class="form-control" id="seo_keywords" name="seo_keywords"  type="text" value="'.get_data('seo_keywords').'"/>
                                    </div>
                                </div>                    
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label for="seo_description" class="control-label">SEO Description</label>
                                        <textarea class="form-control" id="seo_description" name="seo_description" type="text" rows="5" >'.get_data('seo_description').'</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>';
}