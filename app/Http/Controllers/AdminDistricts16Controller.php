<?php namespace App\Http\Controllers;

use App\Models\Employment;
use Request;
	use CRUDBooster;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

	class AdminDistricts16Controller extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "soato";
			$this->limit = "250";
			$this->orderby = "soato,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "soato_new";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Id","name"=>"id"];
			$this->col[] = ["label"=>"Soato","name"=>"soato"];
			$this->col[] = ["label"=>"Вилоят номи","name"=>"region_id","join"=>"regions_new,name_uz_cl"];
			$this->col[] = ["label"=>"Туман номи","name"=>"name_uz_cl"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			$columns=[];
			$columns[] = ['label'=>'Id','name'=>'id','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10','readonly'=>true];
			$columns[] = ['label'=>'Ишсизлар (БТР)','name'=>'unemployed','type'=>'number','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$columns[] = ['label'=>'Вакансиялар сони','name'=>'vacancies','type'=>'number','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$columns[] = ['label'=>'Мурожаат килганлар сони','name'=>'applicants','type'=>'number','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$columns[] = ['label'=>'Ишга жойлаштирилганлар сони','name'=>'number_employed','type'=>'number','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$columns[] = ['label'=>'Date','name'=>'date','type'=>'text','validation'=>'required|date','width'=>'col-sm-10'];

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Вилоят номи','name'=>'region_id', 'disabled'=>true,'type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'regions_new,name_uz_cl'];
			$this->form[] = ['label'=>'Туман номи','name'=>'name_uz_cl','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'You can only enter the letter only','readonly'=>'true'];
			$this->form[] = ['label'=>'Ишга жойлаштириш','name'=>'employment', 'columns'=>$columns,'type'=>'child','validation'=>'required','width'=>'col-sm-10','table'=>'employment','foreign_key'=>'soato_new_id'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Туман номи','name'=>'name_uz_cl','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'You can only enter the letter only','readonly'=>'true'];
			//$this->form[] = ['label'=>'Ишга жойлаштириш','name'=>'employment','columns'=>$columns,'type'=>'child','validation'=>'required','width'=>'col-sm-10'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }

		public function getEdit($id)
		{
			$this->cbLoader();
			$row = DB::table($this->table)->where($this->primary_key, $id)->first();

			if (! CRUDBooster::isRead() && $this->global_privilege == false || $this->button_edit == false) {
				CRUDBooster::insertLog(cbLang("log_try_edit", [
					'name' => $row->{$this->title_field},
					'module' => CRUDBooster::getCurrentModule()->name,
				]));
				CRUDBooster::redirect(CRUDBooster::adminPath(), cbLang('denied_access'));
			}

			$page_menu = Route::getCurrentRoute()->getActionName();
			$page_title = cbLang("edit_data_page_title", ['module' => CRUDBooster::getCurrentModule()->name, 'name' => $row->{$this->title_field}]);
			$command = 'edit';
			Session::put('current_row_id', $id);

			return view('form', compact('id', 'row', 'page_menu', 'page_title', 'command'));
		}
		public function postEditSave($id)
		{
			$request=request()->all();
			if(request()->has('isgazoilastiris-id'))
			{
					foreach ($request['isgazoilastiris-id'] as $key => $value) {
						$arr=[];
						$arr['soato_new_id']=$id;
						$arr['unemployed']=$request['isgazoilastiris-unemployed'][$key]??0;
						$arr['vacancies']=$request['isgazoilastiris-vacancies'][$key]??0;
						$arr['applicants']=$request['isgazoilastiris-applicants'][$key]??0;
						$arr['number_employed']=$request['isgazoilastiris-number_employed'][$key]??0;
						$arr['date']=$request['isgazoilastiris-date'][$key];
						if($value)
						{
							Employment::find($value)->update($arr);
						}
						else
						{
							$res=Employment::create($arr);
							$request['isgazoilastiris-id'][$key]=$res->id;
						}
					}
					$employments=Employment::where(['soato_new_id'=>$id])->get();
					foreach($employments as $item)
					{
						if(!in_array($item->id,$request['isgazoilastiris-id']))
						{
							$item->delete();
						}
					}
			}
			if (request('submit') == cbLang('button_save_more')) {
				CRUDBooster::redirect(CRUDBooster::mainpath('add'), cbLang("alert_update_data_success"), 'success');
			} else {
				CRUDBooster::redirect(CRUDBooster::mainpath(), cbLang("alert_update_data_success"), 'success');
			}
		}
	    

	    //By the way, you can still create your own method in here... :) 


	}