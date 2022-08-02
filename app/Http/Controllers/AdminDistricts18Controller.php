<?php namespace App\Http\Controllers;

use App\Models\VocantionalTraining;
use Request;
	use CRUDBooster;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

	class AdminDistricts18Controller extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "250";
			$this->orderby = "id,desc";
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
			$columns [] = ['label'=>'Id','name'=>'id','type'=>'hidden','validation'=>'required|integer|min:0','width'=>'col-sm-10','readonly'=>true];
			$columns [] = ['label'=>'Ўқув марказлари сони','name'=>'number_centers','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$columns [] = ['label'=>'Ўқув марказлари қуввати','name'=>'capacity_centers','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$columns [] = ['label'=>'Ўқишга берилган йулланмалар сони','name'=>'number_scholarships','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$columns [] = ['label'=>'Ўқишга қабул қилинганлар сони','name'=>'number_students','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$columns [] = ['label'=>'Ўқишни тугатганлар сони','name'=>'number_graduates','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$columns [] = ['label'=>'Ўқишдан четлаштирилганлар сони','name'=>'number_dropouts','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$columns [] = ['label'=>'Ўқишни тугатганлардан ишга жойлашганлар сони','name'=>'number_employed','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$columns [] = ['label'=>'Сана','name'=>'date','type'=>'text','validation'=>'required','width'=>'col-sm-10'];

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Вилоят номи','name'=>'region_id','type'=>'select','validation'=>'required','width'=>'col-sm-9','datatable'=>'regions_new,name_uz_cl','disabled'=>true];
			$this->form[] = ['label'=>'Туман номи','name'=>'name_uz_cl','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','readonly'=>true];
			$this->form[] = ['label'=>'Касбга ўқитиш','columns'=>$columns,'name'=>'vocational_training','type'=>'child','validation'=>'required','width'=>'col-sm-10','table'=>'vocational_training','foreign_key'=>'soato_new_id'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Вилоят номи','name'=>'name_uz_cl','type'=>'select','validation'=>'required','width'=>'col-sm-9','readonly'=>'true'];
			//$this->form[] = ['label'=>'Туман номи','name'=>'name_uz_cl','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','table'=>'vocational_training','foreign_key'=>'soato_new_id'];
			//$this->form[] = ['label'=>'Касбга ўқитиш','name'=>'vocational_training','type'=>'child','validation'=>'required','width'=>'col-sm-10','datatable'=>'regions_new,name_uz_cl'];
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



	    //By the way, you can still create your own method in here... :) 
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
			if(request()->has('kasbgaqitis-id'))
			{
					foreach ($request['kasbgaqitis-id'] as $key => $value) {
						$arr=[];
						$arr['soato_new_id']=$id;
						$arr['number_centers']=$request['kasbgaqitis-number_centers'][$key]??0;
						$arr['capacity_centers']=$request['kasbgaqitis-capacity_centers'][$key]??0;
						$arr['number_scholarships']=$request['kasbgaqitis-number_scholarships'][$key]??0;
						$arr['number_students']=$request['kasbgaqitis-number_students'][$key]??0;
						$arr['number_graduates']=$request['kasbgaqitis-number_graduates'][$key]??0;
						$arr['number_dropouts']=$request['kasbgaqitis-number_dropouts'][$key]??0;
						$arr['number_employed']=$request['kasbgaqitis-number_employed'][$key]??0;
						$arr['date']=$request['kasbgaqitis-date'][$key];
						if($value)
						{
							VocantionalTraining::find($value)->update($arr);
						}
						else
						{
							$res=VocantionalTraining::create($arr);
							$request['kasbgaqitis-id'][$key]=$res->id;
						}
					}
					$vocantionalTrainings=VocantionalTraining::where(['soato_new_id'=>$id])->get();
					foreach($vocantionalTrainings as $item)
					{
						if(!in_array($item->id,$request['kasbgaqitis-id']))
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
	    

	}